-- MySQL

create table users (
  id int auto_increment primary key,
  username varchar(20) not null unique,
  password char(64) not null, -- hash
  is_admin boolean not null
  );

create table languages (
  id int auto_increment primary key,
  name varchar(50) not null unique
  );

create table card_sets (
  id int auto_increment primary key,
  title varchar(50) not null,
  description varchar(200) not null,
  language1_id int not null,
  language2_id int not null,
  user_id int not null,
  foreign key (language1_id) references languages(id) on delete cascade,
  foreign key (language2_id) references languages(id) on delete cascade,
  foreign key (user_id) references users(id) on delete cascade
  );

create table cards (
  id int auto_increment primary key,
  word1 varchar(50) not null,
  word2 varchar(50) not null,
  set_id int not null,
  foreign key (set_id) references card_sets(id) on delete cascade
  );

create table favorites (
  user_id int not null,
  set_id int not null,
  foreign key (user_id) references users(id) on delete cascade,
  foreign key (set_id) references card_sets(id) on delete cascade,
  primary key (user_id, set_id)
  );
