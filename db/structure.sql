
drop table if exists t_user;

drop table if exists t_money;

drop table if exists t_groupe;

drop table if exists t_concernes;



create table t_money (

    mon_id integer not null primary key auto_increment,

    mon_montant DECIMAL not null,

    mon_id_payeur integer not null,

    mon_date Date not null,

    mon_id_groupe varchar(20) not null, 

    mon_description varchar(100) not null  
	
   
	
) engine=innodb character set utf8 collate utf8_unicode_ci;


create table t_user (

    usr_id integer not null primary key auto_increment,

    usr_name varchar(50) not null,

    usr_id_groupe varchar(20) not null,

    usr_couleur varchar(20) not null 

) engine=innodb character set utf8 collate utf8_unicode_ci;


create table t_groupe (

    gro_id integer not null primary key auto_increment,

    gro_name varchar(25) not null,

    gro_password varchar(88) not null
)engine=innodb character set utf8 collate utf8_unicode_ci;


create table t_concernes (

    con_id integer not null primary key auto_increment,

    con_id_user integer not null,

    con_id_money integer not null
)engine=innodb character set utf8 collate utf8_unicode_ci;
