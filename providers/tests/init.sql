CREATE TABLE users(
  id INTEGER PRIMARY KEY,
  alias text,
  "password" text,
  is_admin int,
  is_active int,
  campaign_id int,
  person_id int,
  created_at datetime DEFAULT NULL,
  deleted int DEFAULT '0'
);
INSERT INTO users(id,alias,password,is_active) values(1,'ducktape',"",1);

CREATE TABLE tokens (
  id integer primary key autoincrement,
  type int default 0,
  status int default 0,
  token text,
  secret text,
  consumer_id int,
  user_id int
);
INSERT INTO tokens (type,status,token,secret,consumer_id) VALUES (0,0,'requesttoken','requestsecret',1);

CREATE TABLE consumers (
  id integer,
  name text,
  verifier text,
  consumer_key text,
  secret text,
  status int
);
INSERT INTO consumers (id,name,verifier,consumer_key,secret,status) VALUES (1,'validconsumer','verifier.php','consumerkey','consumersecret',1);

CREATE TABLE examples (
  id integer primary key autoincrement,
  name text,
  created_at datetime DEFAULT NULL,
  deleted int DEFAULT '0'
);

INSERT INTO examples (name) values ("FirstExample");
INSERT INTO examples (name) values ("SecondExample");
