DROP TABLE IF EXISTS faq CASCADE;
DROP TABLE IF EXISTS comment_notification CASCADE;
DROP TABLE IF EXISTS vote_notification CASCADE;
DROP TABLE IF EXISTS follow_notification CASCADE;
DROP TABLE IF EXISTS vote CASCADE;
DROP TABLE IF EXISTS unban_appeal CASCADE;
DROP TABLE IF EXISTS partner_request CASCADE;
DROP TABLE IF EXISTS report_content CASCADE;
DROP TABLE IF EXISTS report_users CASCADE;
DROP TABLE IF EXISTS request CASCADE;
DROP TABLE IF EXISTS news_tag CASCADE;
DROP TABLE IF EXISTS news CASCADE;
DROP TABLE IF EXISTS tag CASCADE;
DROP TABLE IF EXISTS ban CASCADE;
DROP TABLE IF EXISTS content CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS follow CASCADE;
DROP TABLE IF EXISTS users CASCADE;

DROP TYPE IF EXISTS GENDER_TYPE CASCADE;
DROP TYPE IF EXISTS STATUS_TYPE CASCADE;

CREATE TYPE GENDER_TYPE AS ENUM('m','f','n');
CREATE TYPE STATUS_TYPE AS ENUM('approved', 'rejected');

CREATE TABLE users(
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    username VARCHAR(20) NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    description TEXT,
    photo TEXT,
    birthdate DATE NOT NULL, /* add trigger to check age > 13 */
    gender GENDER_TYPE NOT NULL,
    reputation INTEGER NOT NULL DEFAULT 0,
    last_day_of_vote DATE,
    count_last_day_rep INTEGER DEFAULT 0,
    is_moderator BOOLEAN NOT NULL DEFAULT false,
    is_partner BOOLEAN NOT NULL DEFAULT false,
    is_banned BOOLEAN NOT NULL DEFAULT false,
    is_deleted BOOLEAN NOT NULL DEFAULT false,
    remember_token TEXT,
    api_token TEXT UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE follow(
    follower_id INTEGER NOT NULL,
    users_id INTEGER NOT NULL,
    PRIMARY KEY(follower_id, users_id),
    CONSTRAINT fk_follower_id
        FOREIGN KEY(follower_id)
            REFERENCES users (id)
            ON DELETE CASCADE,
    CONSTRAINT fk_users_id
        FOREIGN KEY(users_id)
            REFERENCES users (id)
            ON DELETE CASCADE
);

CREATE TABLE ban(
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    users_id INTEGER NOT NULL,
    moderator_id INTEGER NOT NULL, /*CHECK users.is_moderator == true with triggers*/
    start_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    end_date TIMESTAMP WITH TIME ZONE  DEFAULT NULL CHECK (end_date > start_date),
    reason TEXT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_moderator_id
        FOREIGN KEY(moderator_id)
            REFERENCES users (id)
            ON DELETE CASCADE,
     CONSTRAINT fk_users_id
        FOREIGN KEY(users_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE

);

CREATE TABLE content (
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    author_id INTEGER NOT NULL,
    body TEXT NOT NULL,
    date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    nr_votes INTEGER NOT NULL DEFAULT 0,
    PRIMARY KEY(id),
    CONSTRAINT fk_author_id
        FOREIGN KEY(author_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE
);

CREATE TABLE tag (
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    name VARCHAR(40) NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE news (
    content_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    image TEXT,
    trending_score INTEGER NOT NULL DEFAULT 0,
    nr_comments INTEGER NOT NULL DEFAULT 0,
    PRIMARY KEY(content_id),
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id)
	        REFERENCES content (id)
	        ON DELETE CASCADE

);

CREATE TABLE news_tag (
    news_id INTEGER,
    tag_id INTEGER,
    PRIMARY KEY(news_id, tag_id),
    CONSTRAINT fk_news_id
        FOREIGN KEY(news_id)
	        REFERENCES  news (content_id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_tag_id
        FOREIGN KEY(tag_id)
	        REFERENCES  tag (id)
	        ON DELETE CASCADE
);

CREATE TABLE comment (
    content_id INTEGER NOT NULL,
    news_id INTEGER NOT NULL,
    reply_to_id INTEGER,
    level INTEGER DEFAULT 0,
    PRIMARY KEY(content_id),
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id)
	        REFERENCES content (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_news_id
        FOREIGN KEY(news_id)
	        REFERENCES news (content_id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_reply_to_id
        FOREIGN KEY(reply_to_id)
	        REFERENCES comment (content_id)
	        ON DELETE CASCADE
);

CREATE TABLE request (
   id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
   from_id INTEGER NOT NULL,
   moderator_id INTEGER, /* CHECK moderator_id.is_moderator == true WITH TRIGGERS*/
   reason TEXT NOT NULL,
   creation_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
   status STATUS_TYPE,
   revision_date TIMESTAMP WITH TIME ZONE CHECK (revision_date > creation_date),
   PRIMARY KEY(id),
   CONSTRAINT fk_from_id
        FOREIGN KEY(from_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_moderator_id
        FOREIGN KEY(moderator_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE
);

CREATE TABLE report_users (
    request_id INTEGER NOT NULL,
    to_users_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id)
	        REFERENCES request (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_to_users_id
        FOREIGN KEY(to_users_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE
);

CREATE TABLE report_content (
    request_id INTEGER NOT NULL,
    to_content_id INTEGER,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id)
	        REFERENCES request (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_to_content_id
        FOREIGN KEY(to_content_id)
	        REFERENCES content (id)
	        ON DELETE SET NULL
);

CREATE TABLE partner_request (
    request_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id)
	        REFERENCES request (id)
	        ON DELETE CASCADE
);

CREATE TABLE unban_appeal (
    request_id INTEGER NOT NULL,
    ban_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id)
	        REFERENCES request (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_ban_id
        FOREIGN KEY(ban_id)
	        REFERENCES ban (id)
	        ON DELETE CASCADE
);

CREATE TABLE vote (
    users_id INTEGER,
    content_id INTEGER, /*CHECK content.author_id != users_id */
    value INTEGER NOT NULL,
    PRIMARY KEY(users_id, content_id),
    CONSTRAINT fk_users_id
        FOREIGN KEY(users_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id)
	        REFERENCES content (id)
	        ON DELETE CASCADE
);

CREATE TABLE follow_notification (
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    follower_id INTEGER,
    users_id INTEGER,
    is_new BOOLEAN NOT NULL DEFAULT true,
    creation_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_follower_id
        FOREIGN KEY(follower_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_users_id
        FOREIGN KEY(users_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE
);

CREATE TABLE vote_notification (
    voter_id INTEGER,
    content_id INTEGER,
    author_id INTEGER,
    is_new BOOLEAN NOT NULL DEFAULT true,
    creation_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    PRIMARY KEY(voter_id, content_id, author_id),
    CONSTRAINT fk_voter_id
        FOREIGN KEY(voter_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id)
	        REFERENCES content (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_author_id
        FOREIGN KEY(author_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE
);

CREATE TABLE comment_notification (
    users_id INTEGER,
    comment_id INTEGER,
    is_new BOOLEAN NOT NULL DEFAULT true,
    creation_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    PRIMARY KEY(users_id, comment_id),
    CONSTRAINT fk_users_id
        FOREIGN KEY(users_id)
	        REFERENCES users (id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_comment_id
        FOREIGN KEY(comment_id)
	        REFERENCES comment (content_id)
	        ON DELETE CASCADE
);

CREATE TABLE faq (
    id INTEGER GENERATED ALWAYS AS IDENTITY (START WITH 1 INCREMENT BY 1),
    question TEXT NOT NULL UNIQUE,
    answer TEXT NOT NULL,
    PRIMARY KEY(id)
);


/**
 *   Indices
 */
DROP INDEX IF EXISTS is_banned_idx;
DROP INDEX IF EXISTS is_deleted_idx;
DROP INDEX IF EXISTS trending_score_idx;
DROP INDEX IF EXISTS content_date_idx;
DROP INDEX IF EXISTS content_vote_idx;
DROP INDEX IF EXISTS search_users_idx;
DROP INDEX IF EXISTS content_author_idx;

CREATE INDEX is_banned_idx ON users USING hash(is_banned);
CREATE INDEX is_deleted_idx ON users USING hash(is_deleted);
CREATE INDEX trending_score_idx ON news USING btree(trending_score);
CREATE INDEX content_date_idx ON content USING btree(date);
CREATE INDEX content_vote_idx ON content USING btree(nr_votes);
CREATE INDEX content_author_idx ON content USING hash(author_id);

ALTER TABLE news ADD COLUMN search TSVECTOR;
CREATE INDEX search_news_idx ON news USING GIST (search);
ALTER TABLE users ADD COLUMN search TSVECTOR;
CREATE INDEX search_users_idx ON users USING GIN (search);


/**
 *  Triggers
 */

--Trigger 1 - Ensure that only moderators can approve / reject requests
DROP FUNCTION IF EXISTS action_is_from_moderator() CASCADE;
DROP TRIGGER IF EXISTS trigger_is_from_moderator ON request;

CREATE OR REPLACE FUNCTION action_is_from_moderator() RETURNS TRIGGER AS
    $BODY$
        BEGIN
            IF NOT (SELECT is_moderator FROM users WHERE users.id = new.moderator_id) THEN
                RAISE EXCEPTION 'There must be a moderator to update a request status.';
            END IF;
            RETURN NEW;
        END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER trigger_is_from_moderator
    BEFORE UPDATE OF status ON request
    FOR EACH ROW
    EXECUTE PROCEDURE action_is_from_moderator();


--Trigger 2 - A user cannot follow himself
DROP FUNCTION IF EXISTS follow_self() CASCADE;
DROP TRIGGER IF EXISTS follow_self ON follow;

CREATE OR REPLACE FUNCTION follow_self() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        IF NEW.follower_id = NEW.users_id THEN
            RAISE EXCEPTION 'An user cannot follow himself';
        END IF;
        RETURN New;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER follow_self
    BEFORE INSERT ON follow
    FOR EACH ROW
    EXECUTE PROCEDURE follow_self();

--Trigger 3 - Maximum of 5 reputation points per day from voting
DROP FUNCTION IF EXISTS maximum_rep_day() CASCADE;
DROP TRIGGER IF EXISTS maximum_rep_day ON vote;

CREATE OR REPLACE FUNCTION maximum_rep_day() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        IF CURRENT_DATE = (SELECT last_day_of_vote FROM users u WHERE new.users_id = u.id) THEN
            IF 5 > (SELECT count_last_day_rep FROM users u WHERE new.users_id = u.id) THEN
                UPDATE users u
                SET count_last_day_rep = count_last_day_rep + 1,
                    reputation = reputation + 1
                WHERE new.users_id = u.id;
            END IF;
        ELSE
            UPDATE users u
            SET last_day_of_vote = CURRENT_DATE,
                count_last_day_rep = 1,
                reputation = reputation + 1
            WHERE new.users_id = u.id;
        END IF;
        RETURN New;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER maximum_rep_day
    BEFORE INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE maximum_rep_day();


--Trigger 4 - The minimum age for a user to be registers is 13 years old
DROP FUNCTION IF EXISTS minimum_age() CASCADE;
DROP TRIGGER IF EXISTS minimum_age ON users;

CREATE OR REPLACE FUNCTION minimum_age() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        IF New.birthdate >= now() - INTERVAL '13 years'
            THEN RAISE EXCEPTION 'A User must be at least 13 years old';
        END IF;
        RETURN New;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER minimum_age
    BEFORE INSERT OR UPDATE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE minimum_age();

--Trigger 5 - An Authenticated User can't vote on his own news/comments
DROP FUNCTION IF EXISTS vote_self() CASCADE;
DROP TRIGGER IF EXISTS vote_self ON vote;

CREATE OR REPLACE FUNCTION vote_self() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        IF new.users_id = (SELECT author_id FROM content WHERE new.content_id = content.id) THEN
            RAISE EXCEPTION 'A user cannot vote in his own content';
        END IF;
        RETURN new;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER vote_self
    BEFORE INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_self();

--Trigger 6 - Deal with Request
DROP FUNCTION IF EXISTS deal_with_request() CASCADE;
DROP TRIGGER IF EXISTS deal_with_request ON request;

CREATE OR REPLACE FUNCTION deal_with_request() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        IF new.status='approved' THEN
            -- PARTNER REQUEST
            IF EXISTS (SELECT * FROM partner_request WHERE new.id=request_id) THEN
            UPDATE users SET is_partner=true where new.from_id=users.id;
            -- REPORT CONTENT REQUEST
            ELSIF EXISTS (SELECT * FROM report_content, content WHERE new.id=request_id AND content.id=to_content_id) THEN
                DELETE FROM content WHERE content.id IN (SELECT to_content_id FROM report_content, content WHERE new.id=request_id AND content.id=to_content_id);
                -- TRANSACTION TO DELETE COMMENT/NEWs
            -- UNBAN APPEAL REQUEST
            ELSIF EXISTS (SELECT * FROM unban_appeal, users WHERE new.id=request_id AND users.id=new.from_id) THEN
                UPDATE users SET is_banned=false WHERE new.from_id=users.id;
                IF EXISTS (SELECT * FROM ban WHERE ban.id=ban_id) THEN
                UPDATE ban SET end_date=NOW() WHERE ban.id=new.ban_id;
                END IF;
            END IF;
            new.revision_date=NOW();
        END IF;
        RETURN new;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER deal_with_request
    AFTER UPDATE ON request
    FOR EACH ROW
    EXECUTE PROCEDURE deal_with_request();


--Trigger 7 - Increase Number of Comments in a News Post
DROP FUNCTION IF EXISTS increase_comments() CASCADE;
DROP TRIGGER IF EXISTS increase_comments ON comment;

CREATE OR REPLACE FUNCTION increase_comments() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        UPDATE news SET nr_comments = news.nr_comments + 1
        WHERE new.news_id=news.content_id;

        IF new.reply_to_id IS NOT NULL THEN
            UPDATE comment SET level = ((SELECT c2.level FROM comment c2 WHERE c2.content_id = new.reply_to_id) + 1)
            WHERE comment.content_id = new.content_id;
        END IF;
        RETURN new;
    END

    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER increase_comments
    AFTER INSERT ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE increase_comments();


--Trigger 8 - Decrease Number of Comments in a News Post
DROP FUNCTION IF EXISTS decrease_comments() CASCADE;
DROP TRIGGER IF EXISTS decrease_comments ON comment;

CREATE OR REPLACE FUNCTION decrease_comments() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        UPDATE news SET nr_comments = nr_comments - 1
        WHERE old.news_id = content_id;
        RETURN old;
    END

    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER decrease_comments
    AFTER DELETE ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE decrease_comments();

--Trigger 9 - Increase Trending Score and Number of Votes with a Vote
DROP FUNCTION IF EXISTS increase_ts_and_votes() CASCADE;
DROP TRIGGER IF EXISTS increase_ts_and_votes ON vote;

CREATE OR REPLACE FUNCTION increase_ts_and_votes() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        UPDATE news
        SET trending_score = trending_score + new.value
        WHERE news.content_id=new.content_id;

        UPDATE content
        SET nr_votes = nr_votes + new.value
        WHERE content.id=new.content_id;

        RETURN new;
    END

    $BODY$
LANGUAGE plpgsql;


CREATE TRIGGER increase_ts_and_votes
    AFTER INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE increase_ts_and_votes();


--Trigger 10 - Decrease Trending Score and Number of Votes with a Vote
DROP FUNCTION IF EXISTS decrease_ts_and_votes() CASCADE;
DROP TRIGGER IF EXISTS decrease_ts_and_votes ON vote;

CREATE OR REPLACE FUNCTION decrease_ts_and_votes() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        UPDATE news
        SET trending_score = news.trending_score - old.value
        WHERE old.content_id=news.content_id ;

        UPDATE content
        SET nr_votes = nr_votes - old.value
        WHERE old.content_id = content.id ;

        UPDATE users
        SET reputation = reputation - 1
        WHERE new.users_id = users.id;

        RETURN old;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER decrease_ts_and_votes
    AFTER DELETE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE decrease_ts_and_votes();


--Trigger 11 -A trigger is needed to create a new follow notification when an user starts following another.
DROP FUNCTION IF EXISTS create_follow_notification() CASCADE;
DROP TRIGGER IF EXISTS create_follow_notification ON follow;

CREATE OR REPLACE FUNCTION create_follow_notification() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        INSERT INTO follow_notification (follower_id, users_id, is_new, creation_date)
        VALUES (new.follower_id, new.users_id, true, now());

        RETURN new;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER create_follow_notification
    AFTER INSERT ON follow
    FOR EACH ROW
    EXECUTE PROCEDURE create_follow_notification();


-- Trigger 12 - Create Vote Notification
DROP FUNCTION IF EXISTS create_vote_notification() CASCADE;
DROP TRIGGER IF EXISTS create_vote_notification ON vote;

CREATE OR REPLACE FUNCTION create_vote_notification() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        INSERT INTO vote_notification
            SELECT new.users_id, c.id, c.author_id, true, now()
            FROM content c
            WHERE new.content_id = c.id;
        RETURN new;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER create_vote_notification
    AFTER INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE create_vote_notification();


-- Trigger 12 - Delete Vote Notification
DROP FUNCTION IF EXISTS delete_vote_notification() CASCADE;
DROP TRIGGER IF EXISTS delete_vote_notification ON vote;

CREATE OR REPLACE FUNCTION delete_vote_notification() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        DELETE FROM vote_notification
            WHERE vote_notification.voter_id=old.users_id
            and old.content_id = vote_notification.content_id;
        RETURN old;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_vote_notification
    AFTER DELETE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE delete_vote_notification();


-- Trigger  - Delete Follow Notification
DROP FUNCTION IF EXISTS delete_follow_notification() CASCADE;
DROP TRIGGER IF EXISTS delete_follow_notification ON follow;

CREATE OR REPLACE FUNCTION delete_follow_notification() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        DELETE FROM follow_notification
            WHERE follow_notification.users_id=old.users_id
            and old.follower_id = follow_notification.follower_id;
        RETURN old;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_follow_notification
    AFTER DELETE ON follow
    FOR EACH ROW
    EXECUTE PROCEDURE delete_follow_notification();



--Trigger 13 - Create Comment Notification
DROP FUNCTION IF EXISTS create_comment_notification() CASCADE;
DROP TRIGGER IF EXISTS create_comment_notification ON comment;

CREATE OR REPLACE FUNCTION create_comment_notification() RETURNS TRIGGER AS
    $BODY$
    BEGIN
        INSERT INTO comment_notification
            SELECT news.author_id, NEW.content_id, true, now()
            FROM content news
            WHERE NEW.news_id = news.id;

        IF NEW.reply_to_id IS NOT NULL THEN
            INSERT INTO comment_notification
            VALUES (
                (SELECT author_id FROM content WHERE content.id = new.reply_to_id),
                NEW.content_id,
                true,
                now()
            );
        END IF;
        RETURN new;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER create_comment_notification
    AFTER INSERT ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE create_comment_notification();


--Trigger 14 - Update TSVECTOR (News)
DROP FUNCTION IF EXISTS news_search_update() CASCADE;
DROP TRIGGER IF EXISTS news_search_update ON news;

CREATE OR REPLACE FUNCTION news_search_update() RETURNS TRIGGER AS
    $BODY$
    DECLARE news_body TEXT = (SELECT c.body FROM content c WHERE c.id = new.content_id);
    BEGIN
        IF TG_OP = 'INSERT' THEN
            NEW.search =
                setweight(to_tsvector(coalesce(NEW.title, '')), 'B') ||
                setweight(to_tsvector(coalesce(news_body, '')), 'C');
        END IF;
        IF TG_OP = 'UPDATE' THEN
            IF NEW.title <> OLD.title THEN
                NEW.search =
                    setweight(to_tsvector(coalesce(NEW.title, '')), 'B') ||
                    setweight(to_tsvector(coalesce(news_body, '')), 'C');
            END IF;
        END IF;

        RETURN NEW;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER news_search_update
    BEFORE INSERT OR UPDATE ON news
    FOR EACH ROW
    EXECUTE PROCEDURE news_search_update();


--Trigger 15 - Update TSVECTOR (News)
DROP FUNCTION IF EXISTS news_body_search_update() CASCADE;
DROP TRIGGER IF EXISTS news_body_search_update ON content;

CREATE OR REPLACE FUNCTION news_body_search_update() RETURNS TRIGGER AS
    $BODY$
    DECLARE news_title TEXT = (SELECT title FROM news WHERE news.content_id = new.id);
    BEGIN
        IF news_title IS NOT NULL THEN
            IF NEW.body <> OLD.body THEN
                UPDATE news
                SET search =
                        setweight(to_tsvector(coalesce(news_title, '')), 'B') ||
                        setweight(to_tsvector(coalesce(NEW.body, '')), 'C')
                WHERE news.content_id = new.id;
            END IF;
        END IF;

        RETURN NEW;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER news_body_search_update
    BEFORE UPDATE ON content
    FOR EACH ROW
    EXECUTE PROCEDURE news_body_search_update();



--Trigger 16 - Update TSVECTOR (Users)
DROP FUNCTION IF EXISTS users_search_update() CASCADE;
DROP TRIGGER IF EXISTS users_search_update ON users;

CREATE OR REPLACE FUNCTION users_search_update() RETURNS TRIGGER AS
    $BODY$
    BEGIN
         IF TG_OP = 'INSERT' THEN
            NEW.search =
                setweight(to_tsvector(coalesce(NEW.username, '')), 'A') ||
                setweight(to_tsvector(coalesce(NEW.description, '')), 'B');
        END IF;
        IF TG_OP = 'UPDATE' THEN
            IF NEW.username <> OLD.username OR NEW.description <> OLD.description THEN
                NEW.search =
                    setweight(to_tsvector(coalesce(NEW.username, '')), 'A') ||
                    setweight(to_tsvector(coalesce(NEW.description, '')), 'B');
            END IF;
        END IF;

        RETURN NEW;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER cnews_search_update
    BEFORE INSERT OR UPDATE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE users_search_update();


--Trigger 17 - Update TSVECTOR (News)
DROP FUNCTION IF EXISTS tags_insert_search_update() CASCADE;
DROP TRIGGER IF EXISTS tags_insert_search_update ON content;

CREATE OR REPLACE FUNCTION tags_insert_search_update() RETURNS TRIGGER AS
    $BODY$
    DECLARE tag TEXT = (SELECT name FROM tag WHERE tag.id = new.tag_id);
    BEGIN
        UPDATE news
        SET search = search || setweight(to_tsvector(coalesce(tag, '')), 'A')
        WHERE news.content_id = new.news_id;

        RETURN NEW;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER tags_insert_search_update
    AFTER INSERT ON news_tag
    FOR EACH ROW
    EXECUTE PROCEDURE tags_insert_search_update();

--Trigger 18 - Update TSVECTOR (News)
DROP FUNCTION IF EXISTS tags_delete_search_update() CASCADE;
DROP TRIGGER IF EXISTS tags_delete_search_update ON content;

CREATE OR REPLACE FUNCTION tags_delete_search_update() RETURNS TRIGGER AS
    $BODY$
    DECLARE tag TEXT = (SELECT name FROM tag WHERE tag.id = old.tag_id);
    BEGIN
        UPDATE news
        SET search = ts_delete(search, coalesce(tag, ''))
        WHERE news.content_id = old.news_id;

        RETURN old;
    END
    $BODY$
LANGUAGE plpgsql;

CREATE TRIGGER tags_delete_search_update
    AFTER DELETE ON news_tag
    FOR EACH ROW
    EXECUTE PROCEDURE tags_delete_search_update();

/**
 * POPULATE
 */

insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'admin',
    'admin@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou o Admin/Moderador.',
    'beatriz.png',
    '02/20/1992',
    'f',
    '500000',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'beatriz',
    'beatriz@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou a Beatriz.',
    'beatriz.png',
    '02/20/1992',
    'f',
    '500000',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'andre',
    'andre@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou o Andre.',
    'andre.jpg',
    '02/10/2000',
    'm',
    '500000',
    true,
    false,
    true,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'guilherme',
    'guilherme@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou o Guilherme.',
    'guilherme.jpg',
    '02/20/1922',
    'm',
    '500000',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'ricardo',
    'ricardo@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou o Ricardo.',
    'ricardo.jpg',
    '03/21/1998',
    'm',
    '500000',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'joao',
    'joao@xekkit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'Sou o Joao.',
    null,
    '02/20/1995',
    'm',
    '1000',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'mpitchers0',
    'lpriestner0@tiny.cc',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'morph distributed schemas',
    null,
    '02/20/1922',
    'f',
    '01532',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'gbride1',
    'cjenyns1@meetup.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'optimize robust solutions',
    null,
    '05/06/1947',
    'f',
    '735',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'sdrowsfield2',
    'sgiacovelli2@about.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'streamline virtual web-readiness',
    null,
    '04/11/1943',
    'f',
    '9917',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'gallinson3',
    'bferagh3@eepurl.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'unleash clicks-and-mortar platforms',
    null,
    '01/14/1919',
    'n',
    '64397',
    false,
    false,
    false,
    false
    );
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'bwilloughway4',
    'abilbery4@acquirethisname.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'iterate back-end channels',
    null,
    '06/22/2006',
    'm',
    '2023',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'ashemwell5',
    'eelles5@unesco.org',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'transition magnetic infrastructures',
    null,
    '10/08/2002',
    'n',
    '36',
    true,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'fscading6',
    'nsherrington6@arizona.edu',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'mesh value-added infrastructures',
    null,
    '04/19/1917',
    'f',
    '34',
    false,
    false,
    false,
    true
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'mmountcastle7',
    'ncamier7@uol.com.br',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'engineer collaborative users',
    null,
    '01/20/1976',
    'n',
    '89',
    false,
    true,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'mplowman8',
    'showgego8@psu.edu',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'utilize seamless partnerships',
    null,
    '09/12/1932',
    'n',
    '335',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'lprozescky9',
    'akittow9@1688.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'brand interactive partnerships',
    null,
    '08/31/1963',
    'm',
    '2',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'abellinia',
    'ayoulla@dropbox.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'mesh revolutionary applications',
    null,
    '08/17/1927',
    'm',
    '34685',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'cboordb',
    'lwanneb@blogtalkradio.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'enable revolutionary systems',
    null,
    '12/22/1965',
    'f',
    '24',
    false,
    true,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'ttrembeyc',
    'ssamarthc@aol.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'engineer clicks-and-mortar relationships',
    null,
    '12/13/1931',
    'f',
    '109',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'sstanfordd',
    'nbrendeld@spiegel.de',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'envisioneer sexy users',
    null,
    '07/01/1906',
    'm',
    '77',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'iyoudee',
    'adrainse@goo.ne.jp',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'reintermediate open-source methodologies',
    null,
    '09/24/1979',
    'm',
    '78',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'jwarfieldf',
    'mervinef@behance.net',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'incubate robust channels',
    null,
    '04/30/1935',
    'f',
    '29489',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'iodomg',
    'bwashbrookg@bloglovin.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'benchmark collaborative content',
    null,
    '03/16/2000',
    'f',
    '504',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'sphonixh',
    'sduchesneh@moonfruit.com',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'aggregate revolutionary bandwidth',
    null,
    '06/05/1954',
    'f',
    '2387',
    false,
    false,
    true,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'fosbidstoni',
    'tdoddemeedei@umn.edu',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'engage user-centric web-readiness',
    null,
    '10/08/2005',
    'm',
    '28422',
    false,
    false,
    false,
    false
);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values (
    'bturrillj',
    'jwarlowj@g.co',
    '$2y$10$2WvKlTWYJVzZk3LQXzHVruhPJWASxIoHPUhCbcDZswzlFHrQ6nHIS', /* password = test1234 */
    'enhance frictionless e-business',
    null,
    '11/11/1924',
    'm',
    '105001',
    false,
    false,
    true,
    false
);


insert into follow (follower_id, users_id) values (20, 19);
insert into follow (follower_id, users_id) values (18, 14);
insert into follow (follower_id, users_id) values (10, 19);
insert into follow (follower_id, users_id) values (4, 2);
insert into follow (follower_id, users_id) values (11, 10);
insert into follow (follower_id, users_id) values (6, 16);
insert into follow (follower_id, users_id) values (11, 1);
insert into follow (follower_id, users_id) values (19, 20);
insert into follow (follower_id, users_id) values (19, 5);

insert into ban (users_id, moderator_id, end_date, reason) values (4, 6, '8/13/2022', 'Racist comment');
insert into ban (users_id, moderator_id, end_date, reason) values (12, 3, '12/10/2022', 'Plays fortnite');
insert into ban (users_id, moderator_id, end_date, reason) values (11, 2, '5/9/2022', 'Hate speech');
insert into ban (users_id, moderator_id, end_date, reason) values (20, 6, '7/1/2022', 'Marketed Ponzi scheme');
insert into ban (users_id, moderator_id, end_date, reason) values (14, 6, null, 'Used dangerous external link');

insert into content(author_id, body, nr_votes) values(5,'New Mexico, which has one of the highest poverty rates in the U.S., is a vaccination pacesetter thanks to decisive political decisions, homegrown technology and cooperation. #economy #politics',0);
insert into content(author_id, body, nr_votes) values(12,
'President Joe Biden said Tuesday that he plans to deliver “a lot” on police reform but would not elaborate further ahead of a meeting that afternoon with Vice President Kamala Harris and key members of the Congressional Black Caucus in the Oval Office.
Biden, speaking days after police killed Daunte Wright, a 20-year-old Black man, in a Minneapolis suburb, said he would inform reporters of his plans to reform police at a later date.
The White House billed Tuesday afternoon’s meeting with members of the CBC as an opportunity to create a path forward on voting rights, racial equity and infrastructure legislation. The meeting comes a few days after Susan Rice, director of the Domestic Policy Council, announced that the Biden administration was pausing the creation of a national police oversight commission. #politics',5);
insert into content(author_id, body, nr_votes) values(15,'MANILA (Reuters) - The Philippines filed fresh diplomatic protests to China on Wednesday after accusing its giant neighbour of undertaking illegal fishing and massing more than 240 boats within the Southeast Asian countrys territorial waters.

The Philippine Department of Foreign Affairs said that two protests had been lodged, days after Manila summoned Chinese Ambassador Huang Xilian to press for the withdrawal of its vessels on the disputed Whitsun Reef in the South China Sea and other Philippine maritime zones.

The Philippines last month described the presence of over 200 boats believed to be manned by militias inside its 200 mile (322 km) exclusive economic zone as "swarming and threatening", while the United States, Japan and others have voiced concern about China’s intentions, prompting rebukes by Beijing.

In a Twitter post, Foreign Secretary Teodoro Locsin said: "they really are fishing everything in the water that belongs by law to us."

A Philippine government taskforce said the vessels, which are about 60 metres (197 ft) in length, can catch a tonne of fish a day. It said 240 were in various areas in Philippine waters as of Sunday, including nine at Whitsun Reef.

"The continuous swarming of Chinese vessels poses a threat to the safety of navigation, safety of life at sea, and impedes the exclusive right of Filipinos to benefit from the marine wealth in the EEZ," the task force said in a statement late on Monday.

China embassy in Manila and the foreign ministry in Beijing did not immediately respond to requests for comment. #politics',0);
insert into content(author_id, body, nr_votes) values(5,'Life is difficult in North Korea but there is no famine and some cross-border shipments may resume soon, Russia ambassador in Pyongyang said, a week after North Korean leader Kim Jong Un declared the country was facing a "worst-ever situation."

Kim last week urged ruling party officials to wage another “Arduous March” of work and sacrifice, linking the current economic crises to a period in the 1990s of famine and disaster.

Russia ambassador, one of the few foreign envoys in the country, said that while it was unclear exactly what Kim meant the current situation could not be compared to that period.

"Thank god, it is a long shot from the Arduous March, and I hope it would never come to that," Ambassador Alexander Matsegora told Russias TASS news agency according to a transcript published on Wednesday.
#politics',0);

insert into content(author_id, body, nr_votes) values(19, 'Man, North Korea is such a prison',0);
insert into content(author_id, body, nr_votes) values(20, 'ikr',0);
insert into content(author_id, body, nr_votes) values(15, 'My president <3',0);
insert into content(author_id, body, nr_votes) values(12, 'China being China',0);
insert into content(author_id, body, nr_votes) values(4, 'Awesome!',0);
insert into content(author_id, body, nr_votes) values(6, 'Great',2);
insert into content(author_id, body, nr_votes) values(8, 'I disagree',0);

insert into tag (name) values('economy');
insert into tag (name) values('politics');
insert into tag (name) values('sports');
insert into tag (name) values('covid');
insert into tag (name) values('celebreties');
insert into tag (name) values('music');

insert into news(content_id,title, image, trending_score, nr_comments) values (1,'How New Mexico Became the State With the Highest Rate of Full Vaccinations','1.gif',0,0);
insert into news(content_id,title, image, trending_score, nr_comments) values (2,'Biden promises to deliver on police reform during meeting with Congressional Black Caucus','2.jpg',0,0);
insert into news(content_id,title, image, trending_score, nr_comments) values (3,'Philippines files new diplomatic protests over Chinese boats in disputed waters','3.jpeg',0,0);
insert into news(content_id,title, image, trending_score, nr_comments) values (4,'Russian ambassador says no famine in North Korea, trade may resume soon',null,0,0);

insert into news_tag(news_id, tag_id) values (1,2);
insert into news_tag(news_id, tag_id) values (2,2);
insert into news_tag(news_id, tag_id) values (3,2);
insert into news_tag(news_id, tag_id) values (4,2);
insert into news_tag(news_id, tag_id) values (1,1);

insert into comment(content_id, news_id,reply_to_id) values (5,4,null);
insert into comment(content_id, news_id,reply_to_id) values (6,4,5);
insert into comment(content_id, news_id,reply_to_id) values (7,2,null);
insert into comment(content_id, news_id,reply_to_id) values (8,3,null);
insert into comment(content_id, news_id,reply_to_id) values (9,4,null);
insert into comment(content_id, news_id,reply_to_id) values (10,4,null);
insert into comment(content_id, news_id,reply_to_id) values (11,4,null);

insert into request(from_id,moderator_id,reason,creation_date,status,revision_date) VALUES
(20, NULL,'I am a very influent member of the Xekkit community', '2017-03-17 18:29:21', NULL, NULL);
insert into request(from_id,moderator_id,reason,creation_date,status,revision_date) VALUES
(12, NULL,'Pls unban me, I did nothing wrong', '2019-03-17 18:29:21', NULL , NULL);
insert into request(from_id,moderator_id,reason,creation_date,status,revision_date) VALUES
(20, NULL,'He publicly assumed to play fortnite', '2017-03-17 18:29:21', NULL, NULL);
insert into request(from_id,moderator_id,reason,creation_date,status,revision_date) VALUES
(17, NULL,'This is fake news', '2017-03-17 18:29:21', NULL, NULL );
insert into request(from_id,moderator_id,reason,creation_date,status,revision_date) VALUES
(19, NULL,'I want to have the check before my username ;)', '2021-05-17 05:14:46', NULL, NULL);


insert into partner_request(request_id) values (1);
insert into unban_appeal(request_id, ban_id) values(2,2);
insert into report_users(request_id, to_users_id) values (3,12);
insert into report_content(request_id, to_content_id) values (4,3);
insert into partner_request(request_id) values (5);

insert into vote (users_id, content_id, value) values (20, 4, 1);
insert into vote (users_id, content_id, value) values (7, 2, 1);
insert into vote (users_id, content_id, value) values (7, 3, 1);
insert into vote (users_id, content_id, value) values (7, 4, 1);
insert into vote (users_id, content_id, value) values (7, 5, 1);
insert into vote (users_id, content_id, value) values (7, 6, 1);
insert into vote (users_id, content_id, value) values (7, 7, 1);
insert into vote (users_id, content_id, value) values (19, 2, -1);
insert into vote (users_id, content_id, value) values (15, 5, 1);
insert into vote (users_id, content_id, value) values (8, 3, 1);
insert into vote (users_id, content_id, value) values (14, 2, 1);
insert into vote (users_id, content_id, value) values (16, 3, -1);
insert into vote (users_id, content_id, value) values (4, 5, 1);
insert into vote (users_id, content_id, value) values (3, 6, 1);

update request set moderator_id = 5, status = 'approved', revision_date = '2018-03-17 18:29:21' WHERE id = 1;
update request set moderator_id = 3, status = 'approved', revision_date = '2018-03-17 18:29:21' WHERE id = 3;
update request set moderator_id = 3, status = 'approved', revision_date = '2017-03-20 18:29:21' WHERE id = 4;
update request set moderator_id = 4, status = 'approved', revision_date = CURRENT_DATE WHERE id = 5;


insert into faq(question, answer) values ('How does Xekkit deal with inappropriate comments?','You can request for a User to be banned and later our moderators will analyse said request and decide wether that behaviour is inappropriate');
