create database if not exists microcms character set utf8 collate utf8_unicode_ci;
use FriendlySold;

grant all privileges on FriendlySold.* to 'FriendlySold_user'@'localhost' identified by 'secret';
