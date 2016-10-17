
drop table if exists t_user;

drop table if exists t_money;

drop table if exists t_group;

create table t_money (

    mon_id integer not null primary key auto_increment,

    mon_montant DECIMAL not null,

    mon_IDpayeur integer not null,

    mon_date Date not null,

    mon_group varchar(20) not null, 

    mon_description varchar(100) not null  
	
   
	
) engine=innodb character set utf8 collate utf8_unicode_ci;


create table t_user (

    usr_id integer not null primary key auto_increment,

    usr_name varchar(50) not null,

    usr_password varchar(88) not null,

    usr_group varchar(20) not null,

    usr_couleur varchar(20) not null 

) engine=innodb character set utf8 collate utf8_unicode_ci;



create table t_group (
    gro_id integer not null primary key auto_increment,
    gro_Nom  varchar(30) not null   
    

) engine=innodb character set utf8 collate utf8_unicode_ci;

