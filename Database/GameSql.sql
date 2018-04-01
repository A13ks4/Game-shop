create database GoodNewGames;

use GoodNewGames;

/* Tabla za developera */
create table developer(
	id int(11) not null primary key auto_increment,
	name varchar(45) not null,
	description longtext,
	logo longtext
);

insert into developer (name, description, logo) values 
	("CD Project Red", "CD Projekt S.A. is a Polish video game publisher and distributor based in Warsaw, founded in May 1994 by Marcin Iwiński and Michał Kiciński. Iwiński and Kiciński were video game retailers before they founded the company.","http://www.overclockersclub.com/siteimages/news/news36221_12989-cd_projekt_red_unveils_new_logos_for_the_studio_and_the_witcher_3.png"),
	("Bioware", "BioWare is a Canadian video game developer located in Edmonton, Alberta, Canada. It was founded in February 1995 by newly graduated medical doctors Ray Muzyka, Greg Zeschuk, and Augustine Yip, and is currently owned by American company Electronic Arts.", "http://static.cdn.ea.com/blog.bioware.com/wp-content/uploads/2014/11/BioWareonblack.jpg"),
	("RockStar Games","Rockstar Games, Inc. is an American video game publisher based in New York City. The company was established in December 1998 as a publishing subsidiary of Take-Two Interactive, and as successor to BMG Interactive.","https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Rockstar_Games_Logo.svg/2000px-Rockstar_Games_Logo.svg.png"),
	("Unknown Worlds", "Unknown Worlds Entertainment is an independently owned American game development company whose goal is to 'unite the world through play'. Based in San Francisco, California, the studio is best known for the Natural Selection series and Subnautica.", "https://i.ytimg.com/vi/Ksgu56YjIUM/maxresdefault.jpg"),
	("Ludeon Studios", "Indie developer", "https://ludeon.com/blog/wp-content/themes/twilight-crown/images/LudeonLogoOrange.png"),
	("Stardew Valley", "Chucklefish Limited is an independent British video game developer and publisher based in London. Founded in June 2011 by Finn Brice, the company specialises in action-adventure games.", "");

/* Tabela za zanr */
create table genre(
	id int(11) not null primary key auto_increment,
	name varchar(45) not null
);

insert into genre (name) values ("Action"), ("Fantasy"), ("SciFi"), ("Shooter"), ("Simulation"), ("Adventure");

/* Tabla za igru */
create table game(
	id int(11) not null primary key auto_increment,
	name varchar(45) not null,
	description varchar(255) not null,
	rating decimal(11,2) default 0,
	release_date date not null,
	img longtext not null,
	cena int(11) not null default 60,
	kupljeno int(11) not null default 0,
	id_developer int(11) not null,
	id_genre int(11) not null,
	foreign key (id_developer) references developer(id)
		on update cascade
		on delete restrict,
	foreign key (id_genre) references genre(id)
		on update cascade
		on delete restrict
);

insert into game (name,description,release_date,img,cena,id_developer,id_genre) values 
	("The Witcher: Wild Hunt", "Open world, action exploration game",'2015-10-10',"https://static.gamespot.com/uploads/original/1179/11799911/3171676-witcher.jpg",60,1,2),
	("Subnautica", "Open world exploration survival game","2018-01-18","http://images.thisisxbox.com/Subnautica.jpg",  40,4,3),
	("Divinity: Original sin 2", "Turn based action rpg","2017-08-17","https://cdn-images-1.medium.com/max/1600/1*WVFAyTQ7H9-Qi_6HcYOGsg.jpeg", 45,1,2),
	("Pyre", "Action game", "2017-06-17","https://static.gamespot.com/uploads/screen_kubrick/536/5360430/3050479-trailer_pyre_reveal_20160419.jpg",40,1,2),
	("Stardew valley", "Farming action adventure game","2016-03-16","http://thenerdstash.com/wp-content/uploads/2017/10/stardewval.jpg", 18,6,5),
	("Rimworld", "Colony simulation game","2018-08-18","https://i.ytimg.com/vi/866pKJDoHj4/maxresdefault.jpg", 20,5,5),
	("Grand Theft Auto 5", "Action shooter", "2014-04-14","https://i.ytimg.com/vi/jl2xNWeujZs/maxresdefault.jpg" ,55,3,4),
	("Mass Effect 2", "SciFi shooter","2011-01-28","https://cdn.oboi7.com/content/images/e4/02/e4025fa149e871ed4ea01bfb5ddd03a53b1b5c80.jpg?oboi7.com-94826.jpg", 40,2,3);



/* Tabla za korisnike */
create table user(
	id int(11) not null primary key auto_increment,
	ime varchar(45) not null,
	username varchar(45) not null,
	email varchar(45) not null,
	pass varchar(45) not null,
	img varchar(255) not null default "https://cdn.iconscout.com/public/images/icon/premium/png-512/gamepad-control-game-play-xbox-3d8c51a61e95fa85-512x512.png",
	level smallint(2) not null default 1,
	money int(11) not null default 0
);

/* Ubacujemo admina - samo on ima level 3 */
insert into user(ime, username, email, pass, level) values 
	("Aleksa", "admin", "aleksa.antic@pmf.edu.rs", sha1("admin"), 3),
	("Marko", "mare", "mare@pmf.edu.rs", sha1("mare"), 1);

/* Tabela zakupljene igre */
create table bought(
	id int(11) not null primary key auto_increment,
	id_user int(11) not null,
	id_game int(11) not null,
	foreign key (id_user) references user(id)
		on update cascade
		on delete restrict,
	foreign key (id_game) references game(id)
		on update cascade
		on delete restrict
);

create table cart(
	id int(11) not null primary key auto_increment,
	id_user int(11) not null,
	id_game int(11) not null,
	foreign key (id_user) references user(id)
		on update cascade
		on delete restrict,
	foreign key (id_game) references game(id)
		on update cascade
		on delete restrict
);


/* Tabela za reviews */
create table review(
	id int(11) not null primary key auto_increment,
	title varchar(255) not null,
	description varchar(255) not null,
	ocena int(11) not null,
	id_game int(11) not null,
	id_user int(11) not null,
	foreign key (id_game) references game(id)
		on update cascade
		on delete restrict,
	foreign key (id_user) references user(id)
		on update cascade
		on delete restrict
);