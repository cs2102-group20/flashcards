create table users(
  username varchar(20) primary key,
  pw varchar(20) NOT NULL CHECK (LENGTH(pw)>8),
  isAdmin CHAR(1) NOT NULL CHECK (isAdmin = 'Y' OR isAdmin = 'N')
  );

create table card_set(
  set_id integer primary key,
  title varchar(50),
  description varchar(200),
  language_1 varchar(20),
  language_2 varchar(20),
  check (language_1 <> language_2),
  user_id varchar(20) references users(username));
--auto_increment not supported in Oracle 
create sequence set_id_seq
  start with 1
  increment by 1
  nomaxvalue;

create trigger set_id_trigger
  before insert on card_set
  for each row
  begin
  select set_id_seq.nextval into :new.set_id from dual;
  end;
/

create table card(
  card_id integer primary key,
  word varchar(30),
  translation varchar(60),
  set_id integer references card_set(set_id) on delete cascade);
  
create sequence card_id_seq
  start with 1
  increment by 1
  nomaxvalue;

create trigger card_id_trigger
  before insert on card
  for each row
  begin
  select card_id_seq.nextval into :new.card_id from dual;
  end;
/

create table favoriteSet(
  user_id varchar(20) references users(username),
  set_id integer references card_set(set_id) on delete cascade,
  primary key(user_id,set_id));
