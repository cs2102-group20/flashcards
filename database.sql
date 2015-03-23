create table users(
  username varchar(20) primary key,
  password varchar(20),
  isAdmin BOOLEAN
  );
  
create table card_set(
  set_id integer auto_increment primary key,
  title varchar(50),
  description varchar(200),
  language_1 varchar(20),
  language_2 varchar(20)
  foreign key user_id varchar(20) references user(username));
  
create table card(
  card_id integer auto_increment primary key,
  word varchar(30),
  translation varchar(60),
  foreign key set_id integer references card_set(set_id) on delete cascade);
  
create table favorite(
  foreign key user_id varchar(20) references user(username),
  foreign key set_id integer references card_set(set_id) on delete cascade,
  primary key(user_id,set_id));
