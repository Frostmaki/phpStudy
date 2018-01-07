create database userInfo;
use userInfo;

create table user (userID int not null auto_increment primary key,userName varchar(10) not null,password int not null);

grant all on test.* to rootUser identified by 'rootPassword' WITH GRANT OPTION;

insert into user (userName,password) values ('frostmaki',123456);
insert into user (userName,password) values ('hello',555231);
insert into user (userName,password) values ('php',264166);

grant select,insert,delete,update on test.* to frostmaki identified by '123456';
grant select,insert,delete,update on test.* to hello identified by '555231';
grant select,insert,delete,update on test.* to php identified by '264166';

insert into test.user (name,age) values ('$userName','$password')

select * from user;

alter table user add first primary key(userID);

alter table user modify userID int auto_increment;