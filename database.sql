CREATE TABLE gender ( id integer not null constraint gender_pk primary key, name varchar(32) not null constraint gender_ak_1 unique ); alter TABLE gender owner to bkltcyuptjqqgr;

CREATE TABLE user_account ( id serial constraint user_account_pk primary key, name varchar(64), email varchar(128) not null constraint user_account_ak_1 unique, password varchar(32) not null, birthday date, bio text, gender_id integer constraint user_account_sex references gender, location varchar ); alter TABLE user_account owner to bkltcyuptjqqgr;

CREATE TABLE conversation ( id serial constraint conversation_pk primary key, user_account_id integer not null constraint thread_user_account references user_account ); alter TABLE conversation owner to bkltcyuptjqqgr;

CREATE TABLE match ( id serial constraint match_pk primary key, user_account_id integer not null constraint like_user_account references user_account, target_user_id integer not null constraint match_user_account references user_account, timestamp timestamp default now() ); alter TABLE match owner to bkltcyuptjqqgr;

CREATE TABLE message ( id serial constraint message_pk primary key, sender_id integer, message_content varchar(1000) not null, conversation_id integer constraint message_conversation references conversation, receiver_id integer ); alter TABLE message owner to bkltcyuptjqqgr;

CREATE TABLE participant ( id serial constraint participant_pk primary key, conversation_id integer not null constraint participant_conversation references conversation, user_account_id integer not null constraint participant_user_account references user_account, constraint participant_ak_1 unique (conversation_id, user_account_id) ); alter TABLE participant owner to bkltcyuptjqqgr;

CREATE TABLE user_hobby ( id serial constraint user_hobby_pk primary key, user_account_id integer constraint user_hobby_user_account references user_account, hobby_1 varchar(32), hobby_2 varchar(32), hobby_3 varchar(32) ); alter TABLE user_hobby owner to bkltcyuptjqqgr;

CREATE TABLE user_photo ( id serial constraint user_photo_pk primary key, user_account_id integer not null constraint user_photo_user_account references user_account, photo varchar(255) default 'profile.png'::character varying ); alter TABLE user_photo owner to bkltcyuptjqqgr;

CREATE view vuserphotoandbio(id, name, user_account_id, bio, link) AS
SELECT  up.id
       ,user_account.name
       ,up.user_account_id
       ,user_account.bio
       ,up.link
FROM user_account
JOIN user_photo up
ON user_account.id = up.user_account_id; alter TABLE vuserphotoandbio owner to bkltcyuptjqqgr;

CREATE view vuserchats(id, user_id) AS
SELECT  conversation.id
       ,CASE WHEN conversation.user_account_id = 1 THEN (
SELECT  ua.id
FROM conversation conversation_1
JOIN participant p_1
ON conversation_1.id = p_1.conversation_id
JOIN user_account ua
ON ua.id = p_1.user_account_id
JOIN user_photo up
ON ua.id = up.user_account_id
WHERE conversation_1.user_account_id = 1) WHEN p.user_account_id = 1 THEN (
SELECT  ua.id
FROM conversation conversation_1
JOIN participant p_1
ON conversation_1.id = p_1.conversation_id
JOIN user_account ua
ON ua.id = conversation_1.user_account_id
JOIN user_photo up
ON ua.id = up.user_account_id
WHERE p_1.user_account_id = 1) ELSE NULL::integer END AS user_id
FROM conversation
JOIN participant p
ON conversation.id = p.conversation_id; alter TABLE vuserchats owner to bkltcyuptjqqgr;

CREATE view vstarted_conversations(id, user_id, name, photo) AS
SELECT  DISTINCT iui.id
       ,iui.user_id
       ,ua.name
       ,up.photo
FROM
(
	SELECT  conversation.id
	       ,CASE WHEN conversation.user_account_id = 1 THEN (
	SELECT  ua_1.id
	FROM conversation conversation_1
	JOIN participant p_1
	ON conversation_1.id = p_1.conversation_id
	JOIN user_account ua_1
	ON ua_1.id = p_1.user_account_id
	WHERE conversation_1.user_account_id = 1) WHEN p.user_account_id = 1 THEN (
	SELECT  ua_1.id
	FROM conversation conversation_1
	JOIN participant p_1
	ON conversation_1.id = p_1.conversation_id
	JOIN user_account ua_1
	ON ua_1.id = conversation_1.user_account_id
	WHERE p_1.user_account_id = 1) ELSE NULL::integer END AS user_id
	FROM conversation
	JOIN participant p
	ON conversation.id = p.conversation_id
) iui
JOIN message m
ON iui.id = m.conversation_id
JOIN user_account ua
ON iui.user_id = ua.id
JOIN user_photo up
ON ua.id = up.user_account_id; alter TABLE vstarted_conversations owner to bkltcyuptjqqgr;

CREATE view vallconversations(id, cuser1, cuser2) AS
SELECT  c.id
       ,c.user_account_id AS cuser1
       ,p.user_account_id AS cuser2
FROM conversation c
JOIN participant p
ON c.id = p.conversation_id; alter TABLE vallconversations owner to bkltcyuptjqqgr;

CREATE view vmatch(id, user1, user2) AS
SELECT  match.id
       ,LEAST(match.user_account_id,match.target_user_id)    AS user1
       ,GREATEST(match.user_account_id,match.target_user_id) AS user2
FROM match
GROUP BY  match.id
         ,(LEAST(match.user_account_id,match.target_user_id))
         ,(GREATEST(match.user_account_id,match.target_user_id))
HAVING COUNT(*) = 2; alter TABLE vmatch owner to bkltcyuptjqqgr;

CREATE view vongoing_conversations(id, cuser1, cuser2) AS
SELECT  vallconversations.id
       ,vallconversations.cuser1
       ,vallconversations.cuser2
FROM vallconversations
WHERE (EXISTS(
SELECT  message.conversation_id
FROM message
WHERE vallconversations.id = message.conversation_id)); alter TABLE vongoing_conversations owner to bkltcyuptjqqgr;

CREATE view vnot_started_conversations(id, cuser1, cuser2) AS
SELECT  vallconversations.id
       ,vallconversations.cuser1
       ,vallconversations.cuser2
FROM vallconversations
WHERE NOT (EXISTS(
SELECT  message.conversation_id
FROM message
WHERE vallconversations.id = message.conversation_id)); alter TABLE vnot_started_conversations owner to bkltcyuptjqqgr;

CREATE view vmatches(user1, user2) AS
SELECT  a.user_account_id AS user1
       ,b.user_account_id AS user2
FROM match a
JOIN match b
ON a.user_account_id = b.target_user_id
WHERE a.user_account_id = b.target_user_id
AND b.user_account_id = a.target_user_id
AND a.user_account_id < b.user_account_id
ORDER BY b."timestamp"; alter TABLE vmatches owner to bkltcyuptjqqgr;

CREATE view vmatches_with_id(id, user1, user2) AS
SELECT  row_number() OVER (PARTITION BY true::boolean) AS id
       ,vmatches.user1
       ,vmatches.user2
FROM vmatches; alter TABLE vmatches_with_id owner to bkltcyuptjqqgr;
INSERT INTO public.gender (id, name) values (2, 'Man');
INSERT INTO public.gender (id, name) values (1, 'Woman');
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (56, 'Test', 'test3@test.com', '21232f297a57a5a743894a0e4a801fc3', '2000-02-12', null, 1, null);
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (55, 'Test', 'test2@test.com', '21232f297a57a5a743894a0e4a801fc3', '2001-02-12', null, 1, null);
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (48, 'Test', 'test@test.com', '9ecb0b2f7994a8a3a2919212f764b81a', '2000-03-17', 'sdsad', 1, null);
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (2, 'Jan', 'jsnow@test.com', '21232f297a57a5a743894a0e4a801fc3', '2002-04-25', 'Siema, jestem Jon', 2, 'Cracow');
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (1, 'Kacper', 'test@test.com', '21232f297a57a5a743894a0e4a801fc3', '2000-11-14', 'Hi my name is Kacper', 2, 'Warsaw');
INSERT INTO public.user_account (id, name, email, password, birthday, bio, gender_id, location) values (49, 'Zuza', 'test@test1.com', '21232f297a57a5a743894a0e4a801fc3', '2003-03-22', 'hej', 1, 'Berlin');
INSERT INTO public.user_photo (id, user_account_id, photo) values (2, 2, 'profile.png');
INSERT INTO public.user_photo (id, user_account_id, photo) values (14, 48, 'profile.png');
INSERT INTO public.user_photo (id, user_account_id, photo) values (15, 49, 'girl1.jpg');
INSERT INTO public.user_photo (id, user_account_id, photo) values (20, 55, 'profile.png');
INSERT INTO public.user_photo (id, user_account_id, photo) values (21, 56, 'profile.png');
INSERT INTO public.user_photo (id, user_account_id, photo) values (1, 1, 'profile.png');