
CREATE TYPE gender_type AS ENUM('m','f','n');
CREATE TYPE request_type AS ENUM('report', 'partner', 'unban');
CREATE TYPE status_type AS ENUM('aproved', 'rejected');

Create Table user(
    id_user SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    password text NOT NULL,
    description text,
    photo text,
    birthdate NOT NULL,
    gender gender_type NOT NULL,
    reputation integer NOT NULL DEFAULT 0,
    is_moderator boolean NOT NULL DEFAULT false,
    is_banned boolean NOT NULL DEFAULT false,
    is_partner NOT NULL DEFAULT false
);

CREATE TABLE "content" (
    id_content SERIAL PRIMARY KEY,
    body text NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE news (
    id_news SERIAL PRIMARY KEY,
    body text NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    title text NOT NULL,    
    trending_score CHECK ((trending_score > 0)),
    id_tag INTEGER REFERENCES "tag" (id_tag) ON UPDATE CASCADE
);

CREATE TABLE "comment" (
    id_comment SERIAL PRIMARY KEY,
    body text NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    id_content INTEGER REFERENCES "content" (id_content) ON UPDATE CASCADE
);

CREATE TABLE "tag" (
    id_tag SERIAL PRIMARY KEY,
    "name" text NOT NULL
);

CREATE TABLE "reply" (
    id_reply SERIAL PRIMARY KEY,
    comment INTEGER REFERENCES "comment" (id_comment) ON UPDATE CASCADE
);