DROP TABLE IF EXISTS "faq" CASCADE;
DROP TABLE IF EXISTS "vote" CASCADE;
DROP TABLE IF EXISTS "notification" CASCADE;
DROP TABLE IF EXISTS "unban_appeal" CASCADE;
DROP TABLE IF EXISTS "partner_request" CASCADE;
DROP TABLE IF EXISTS "report_content" CASCADE;
DROP TABLE IF EXISTS "report_user" CASCADE; 
DROP TABLE IF EXISTS "status" CASCADE;
DROP TABLE IF EXISTS "request" CASCADE;
DROP TABLE IF EXISTS "news_tag" CASCADE;
DROP TABLE IF EXISTS "news" CASCADE;
DROP TABLE IF EXISTS "tag" CASCADE;
DROP TABLE IF EXISTS "ban" CASCADE;
DROP TABLE IF EXISTS "content" CASCADE;
DROP TABLE IF EXISTS "comment" CASCADE;
DROP TABLE IF EXISTS "follow" CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;

DROP TYPE IF EXISTS gender_type CASCADE;
DROP TYPE IF EXISTS status_type CASCADE;

CREATE TYPE gender_type AS ENUM('m','f','n');
CREATE TYPE status_type AS ENUM('aproved', 'rejected');

CREATE TABLE "user"(
    id SERIAL PRIMARY KEY,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    description TEXT,
    photo TEXT,
    birthdate DATE NOT NULL,
    gender gender_type NOT NULL,
    reputation INTEGER NOT NULL DEFAULT 0 CHECK (reputation >=0) ,
    is_moderator BOOLEAN NOT NULL DEFAULT false,
    is_banned BOOLEAN NOT NULL DEFAULT false,
    is_partner BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE "follow"(
    id SERIAL PRIMARY KEY,
    follower_id INTEGER NOT NULL references "user" (id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL references "user" (id) ON UPDATE CASCADE
);

CREATE TABLE "ban"(
    id SERIAL PRIMARY KEY,
    start timestamp WITH TIME zone DEFAULT now() NOT NULL,
    "end" timestamp DEFAULT NULL,
    reason TEXT,
    moderator_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE, 
    /*CHECK user.is_moderator == true */
    id_user INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE
);

CREATE TABLE "content" (
    id SERIAL PRIMARY KEY,
    author_id INTEGER REFERENCES "user" (id) ON UPDATE CASCADE,
    body TEXT NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "tag" (
    id SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL UNIQUE
);

CREATE TABLE "news" (
    id SERIAL PRIMARY KEY,
    content_id INTEGER NOT NULL REFERENCES "content" (id) ON UPDATE CASCADE,
    title TEXT NOT NULL,    
    trending_score integer CHECK ((trending_score > 0))
);

CREATE TABLE "news_tag" (
    news_id INTEGER NOT NULL REFERENCES "news" (id) ON UPDATE CASCADE,
    tag_id INTEGER NOT NULL REFERENCES "tag" (id) ON UPDATE CASCADE
);

CREATE TABLE "comment" (
    id SERIAL PRIMARY KEY,
    content_id INTEGER NOT NULL REFERENCES "content" (id) ON UPDATE CASCADE,
    news_id INTEGER NOT NULL REFERENCES "news" (id) ON UPDATE CASCADE,
    reply_to_id INTEGER REFERENCES "comment" (id) ON UPDATE CASCADE
);

CREATE TABLE "request" (
   id SERIAL PRIMARY KEY,
   from_id INTEGER REFERENCES "user" (id) ON UPDATE CASCADE,
   reason TEXT NOT NULL
);

CREATE TABLE "status" (
   id SERIAL PRIMARY KEY,
   request_id INTEGER NOT NULL REFERENCES "request" (id) ON UPDATE CASCADE,
   moderator_id INTEGER REFERENCES "user" (id) ON UPDATE CASCADE, /* CHECK moderator_id.is_moderator == true */
   "value" status_type,
   "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "report_user" (
    id SERIAL PRIMARY KEY,
    request_id INTEGER NOT NULL REFERENCES "request" (id) ON UPDATE CASCADE,
    to_user INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "report_content" (
    id SERIAL PRIMARY KEY,
    request_id INTEGER NOT NULL REFERENCES "request" (id) ON UPDATE CASCADE,
    to_content INTEGER NOT NULL REFERENCES "content" (id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "partner_request" (
    id SERIAL PRIMARY KEY,
    request_id INTEGER NOT NULL REFERENCES "request" (id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "unban_appeal" (
    id SERIAL PRIMARY KEY,
    request_id INTEGER NOT NULL REFERENCES "request" (id) ON UPDATE CASCADE,
    ban_id INTEGER NOT NULL REFERENCES "ban" (id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "vote" (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE,
    content_id INTEGER NOT NULL REFERENCES "content" (id) ON UPDATE CASCADE /*CHECK content.author_id != user_id */,
    value INTEGER NOT NULL
);

CREATE TABLE "notification" (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE,
    vote_id INTEGER NOT NULL REFERENCES "vote" (id) ON UPDATE CASCADE,
    comment_id INTEGER NOT NULL REFERENCES "comment" (id) ON UPDATE CASCADE,
    is_new BOOLEAN DEFAULT true,
    CHECK ((vote_id IS NULL) != (comment_id IS NULL))
);


CREATE TABLE "faq" (
    id SERIAL PRIMARY KEY,
    quastion TEXT NOT NULL UNIQUE,
    answer TEXT NOT NULL
);