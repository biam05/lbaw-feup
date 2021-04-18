insert into follow (follower_id, users_id) values (20, 20);
insert into users (username, email, password, description, photo, birthdate, gender, reputation, is_moderator, is_banned, is_partner, is_deleted) values ('fosbidstoni', 'tdoddemeedei@umn.edu', '5PwEC1GpWoU', 'engage user-centric web-readiness', 'png', '10/08/2013', 'm', '28422', false, false, false, false);
insert into ban (users_id, moderator_id, end_date, reason) values (14, 1, null, 'Used dangerous external link'); --não é moderador
