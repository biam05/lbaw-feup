DROP TABLE IF EXISTS "faq" CASCADE;
DROP TABLE IF EXISTS "vote" CASCADE;
DROP TABLE IF EXISTS "notification" CASCADE;
DROP TABLE IF EXISTS "unban_appeal" CASCADE;
DROP TABLE IF EXISTS "partner_request" CASCADE;
DROP TABLE IF EXISTS "report_content" CASCADE;
DROP TABLE IF EXISTS "report_user" CASCADE; 
DROP TABLE IF EXISTS "request" CASCADE;
DROP TABLE IF EXISTS "news_tag" CASCADE;
DROP TABLE IF EXISTS "news" CASCADE;
DROP TABLE IF EXISTS "tag" CASCADE;
DROP TABLE IF EXISTS "ban" CASCADE;
DROP TABLE IF EXISTS "content" CASCADE;
DROP TABLE IF EXISTS "comment" CASCADE;
DROP TABLE IF EXISTS "follow" CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;

DROP TYPE IF EXISTS GENDER_TYPE CASCADE;
DROP TYPE IF EXISTS STATUS_TYPE CASCADE;

CREATE TYPE GENDER_TYPE AS ENUM('m','f','n');
CREATE TYPE STATUS_TYPE AS ENUM('aproved', 'rejected');

CREATE TABLE "user"(
    id GENERATED ALWAYS AS IDENTITY,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    description TEXT,
    photo TEXT,
    birthdate DATE NOT NULL,
    gender GENDER_TYPE NOT NULL,
    reputation INTEGER NOT NULL DEFAULT 0 CHECK (reputation >=0) ,
    is_moderator BOOLEAN NOT NULL DEFAULT false,
    is_partner BOOLEAN NOT NULL DEFAULT false,
    is_banned BOOLEAN NOT NULL DEFAULT false,
    is_deleted BOOLEAN NOT NULL DEFALT false,
    PRIMARY KEY(id)
);

CREATE TABLE "follow"(
    id GENERATED ALWAYS AS IDENTITY,
    follower_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_follower_id
        FOREIGN KEY(follower_id) 
            REFERENCES "user"(id)
            ON DELETE CASCADE,
    CONSTRAINT fk_user_id
        FOREIGN KEY(user_id) 
            REFERENCES "user"(id)
            ON DELETE CASCADE,
);

CREATE TABLE "ban"(
    id GENERATED ALWAYS AS IDENTITY,
    start timestamp WITH TIME ZONE DEFAULT now() NOT NULL,
    "end" timestamp DEFAULT NULL,
    reason TEXT,
    moderator_id INTEGER NOT NULL, /*CHECK user.is_moderator == true with triggers*/
    user_id INTEGER NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_moderator_id
        FOREIGN KEY(moderator_id) 
            REFERENCES "user"(id)
            ON DELETE CASCADE,
     CONSTRAINT fk_user_id
        FOREIGN KEY(user_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE
        
);

CREATE TABLE "content" (
    id GENERATED ALWAYS AS IDENTITY,
    author_id INTEGER NOT NULL,
    body TEXT NOT NULL,
    "date" TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_author_id
        FOREIGN KEY(author_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "tag" (
    id GENERATED ALWAYS AS IDENTITY,
    "name" TEXT NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE "news" (
    id GENERATED ALWAYS AS IDENTITY,
    content_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    trending_score INTEGER CHECK (trending_score >= 0),
    PRIMARY KEY(id),
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id) 
	        REFERENCES "content"(id)
	        ON DELETE CASCADE
    
);

CREATE TABLE "news_tag" (
    news_id INTEGER,
    tag_id INTEGER,
    PRIMARY KEY(news_id, tag_id),
    CONSTRAINT fk_news_id
        FOREIGN KEY(news_id) 
	        REFERENCES "news"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_tag_id
        FOREIGN KEY(tag_id) 
	        REFERENCES "tag"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "comment" (
    id GENERATED ALWAYS AS IDENTITY,
    content_id INTEGER NOT NULL REFERENCES "content" (id) ON UPDATE CASCADE,
    news_id INTEGER NOT NULL REFERENCES "news" (id) ON UPDATE CASCADE,
    reply_to_id INTEGER REFERENCES "comment" (id) ON UPDATE CASCADE,
    PRIMARY KEY(id),
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id) 
	        REFERENCES "content"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_news_id
        FOREIGN KEY(news_id) 
	        REFERENCES "news"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_reply_to_id
        FOREIGN KEY(reply_to_id) 
	        REFERENCES "comment"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "request" (
   id GENERATED ALWAYS AS IDENTITY,
   from_id INTEGER NOT NULL,
   moderator_id INTEGER NOT NULL, /* CHECK moderator_id.is_moderator == true WITH TRIGGERS*/
   reason TEXT NOT NULL,
   creation_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
   "status" STATUS_TYPE,
   revision_date TIMESTAMP WITH TIME ZONE,
   PRIMARY KEY(id),
   CONSTRAINT fk_from_id
        FOREIGN KEY(from_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_moderator_id
        FOREIGN KEY(moderator_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE
); 

CREATE TABLE "report_user" (
    request_id INTEGER NOT NULL,
    to_user_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id) 
	        REFERENCES "request"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_to_user_id
        FOREIGN KEY(to_user_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "report_content" (
    request_id INTEGER NOT NULL,
    to_content_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id) 
	        REFERENCES "request"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_to_content_id
        FOREIGN KEY(to_content_id) 
	        REFERENCES "content"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "partner_request" (
    request_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id) 
	        REFERENCES "request"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "unban_appeal" (
    request_id INTEGER NOT NULL,
    ban_id INTEGER NOT NULL,
    PRIMARY KEY(request_id),
    CONSTRAINT fk_request_id
        FOREIGN KEY(request_id) 
	        REFERENCES "request"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_ban_id
        FOREIGN KEY(ban_id) 
	        REFERENCES "ban"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "vote" (
    user_id INTEGER,
    content_id INTEGER, /*CHECK content.author_id != user_id */
    value INTEGER NOT NULL,
    PRIMARY KEY(user_id, content_id),
    CONSTRAINT fk_user_id
        FOREIGN KEY(user_id) 
	        REFERENCES "user"(id)
	        ON DELETE CASCADE,
    CONSTRAINT fk_content_id
        FOREIGN KEY(content_id) 
	        REFERENCES "content"(id)
	        ON DELETE CASCADE
);

CREATE TABLE "notification" ( /*not done, will change to composition*/
    id GENERATED ALWAYS AS IDENTITY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE,
    vote_id INTEGER NOT NULL REFERENCES "vote" (id) ON UPDATE CASCADE,
    comment_id INTEGER NOT NULL REFERENCES "comment" (id) ON UPDATE CASCADE,
    is_new BOOLEAN DEFAULT true,
    CHECK (vote_id IS NULL) != (comment_id IS NULL),
    PRIMARY KEY(id),
);


CREATE TABLE "faq" (
    id GENERATED ALWAYS AS IDENTITY,
    question TEXT NOT NULL UNIQUE,
    answer TEXT NOT NULL,
    PRIMARY KEY(id)
);
