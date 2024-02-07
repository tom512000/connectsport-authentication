/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  03/10/2023 19:28:54                      */
/*==============================================================*/


/*==============================================================*/
/* Table : Activite                                             */
/*==============================================================*/
create table Activite
(
   ID_activite          int not null AUTO_INCREMENT,
   dateHeureDeb         datetime not null,
   ID_user              int not null,
   nameAct                 varchar(100) not null,
   duree                int not null,
   nbPlace              int not null,
   lieux                varchar(128) not null,
   primary key (ID_activite, dateHeureDeb)
);

/*==============================================================*/
/* Table : Administrateur                                       */
/*==============================================================*/
create table Administrateur
(
   ID_user              int not null AUTO_INCREMENT,
   ID_activite          int,
   dateHeureDeb         datetime,
   lastName                 varchar(100) not null,
   firstName            varchar(100) not null,
   loginUser            varchar(40) not null,
   sha512pass           varchar(512) not null,
   phone                varchar(10),
   mail                 varchar(100),
   dateNais             date,
   status               int default 1,
   primary key (ID_user)
);

/*==============================================================*/
/* Table : Coach                                                */
/*==============================================================*/
create table Coach
(
   ID_user              int not null AUTO_INCREMENT,
   ID_activite          int,
   dateHeureDeb         datetime,
   lastName                 varchar(100) not null,
   firstName            varchar(100) not null,
   loginUser            varchar(40) not null,
   sha512pass           varchar(512) not null,
   phone                varchar(10),
   mail                 varchar(100),
   dateNais             date,
   status               int default 1,
   specialite           varchar(128),
   primary key (ID_user)
);

/*==============================================================*/
/* Table : Inscription                                          */
/*==============================================================*/
create table Inscription
(
   ID_user              int not null,
   ID_activite          int not null,
   dateHeureDeb         datetime not null,
   primary key (ID_user, ID_activite, dateHeureDeb)
);

/*==============================================================*/
/* Table : Sportif                                              */
/*==============================================================*/
create table Sportif
(
   ID_user              int not null AUTO_INCREMENT, 
   ID_activite          int,
   dateHeureDeb         datetime,
   lastName                 varchar(100) not null,
   firstName            varchar(100) not null,
   loginUser            varchar(40) not null,
   sha512pass           varchar(512) not null,
   phone                varchar(10),
   mail                 varchar(100),
   dateNais             date,
   status               int default 1,
   primary key (ID_user)
);

/*==============================================================*/
/* Table : Type                                                 */
/*==============================================================*/
create table Type
(
   ID_type              int not null AUTO_INCREMENT,
   libelle              varchar(128) not null,
   primary key (ID_type)
);

/*==============================================================*/
/* Table : Type_Activite                                        */
/*==============================================================*/
create table Type_Activite
(
   ID_activite          int not null,
   dateHeureDeb         datetime not null,
   ID_type              int not null,
   primary key (ID_activite, dateHeureDeb, ID_type)
);

/*==============================================================*/
/* Table : Utilisateur                                          */
/*==============================================================*/
create table Utilisateur
(
   ID_user              int not null AUTO_INCREMENT,
   ID_activite          int,
   dateHeureDeb         datetime,
   lastName                 varchar(100) not null,
   firstName            varchar(100) not null,
   loginUser            varchar(40) not null,
   sha512pass           varchar(512) not null,
   phone                varchar(10),
   mail                 varchar(100),
   dateNais             date,
   status               int default 1,
   primary key (ID_user)
);

alter table Activite add constraint FK_Gerer_Activite2 foreign key (ID_user)
      references Utilisateur (ID_user) on delete restrict on update restrict;

alter table Administrateur add constraint FK_Heritage_2 foreign key (ID_user)
      references Utilisateur (ID_user) on delete restrict on update restrict;

alter table Coach add constraint FK_Heritage_1 foreign key (ID_user)
      references Utilisateur (ID_user) on delete restrict on update restrict;

alter table Inscription add constraint FK_Inscription foreign key (ID_user)
      references Utilisateur (ID_user) on delete restrict on update restrict;

alter table Inscription add constraint FK_Inscription2 foreign key (ID_activite, dateHeureDeb)
      references Activite (ID_activite, dateHeureDeb) on delete restrict on update restrict;

alter table Sportif add constraint FK_Heritage_3 foreign key (ID_user)
      references Utilisateur (ID_user) on delete restrict on update restrict;

alter table Type_Activite add constraint FK_Type_Activite foreign key (ID_activite, dateHeureDeb)
      references Activite (ID_activite, dateHeureDeb) on delete restrict on update restrict;

alter table Type_Activite add constraint FK_Type_Activite2 foreign key (ID_type)
      references Type (ID_type) on delete restrict on update restrict;

alter table Utilisateur add constraint FK_Gerer_Activite foreign key (ID_activite, dateHeureDeb)
      references Activite (ID_activite, dateHeureDeb) on delete restrict on update restrict;

