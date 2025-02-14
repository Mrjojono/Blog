/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  1/23/2025 8:57:08 PM                     */
/*==============================================================*/


drop table if exists BLOG;

drop table if exists CATEGORIE;

drop table if exists COMMENTAIRE;

drop table if exists USER;

/*==============================================================*/
/* Table : BLOG                                                 */
/*==============================================================*/
create table BLOG
(
   IDBLOG               varchar(20) null,
   IDCATEGORIE          varchar(20) not null,
   TITRE                char(256) not null,
   CONTENU              longtext not null,
   DATEPUBLICATION      timestamp,
   NOMBREVUES           int,
   STATUS               bool,
   primary key (IDBLOG)
);

/*==============================================================*/
/* Table : CATEGORIE                                            */
/*==============================================================*/
create table CATEGORIE
(
   IDCATEGORIE          varchar(20) not null,
   NOMCATEGORIE         char(256) not null,
   DESCRIPTION          char(256),
   primary key (IDCATEGORIE)
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE
(
   IDCOM                int not null,
   IDUSER               int not null,
   IDBLOG               varchar(20) not null,
   DATECOM              timestamp,
   STATUS               bool,
   CONTENU              longtext not null,
   primary key (IDCOM)
);

/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
   IDUSER               int not null,
   NOM                  longtext not null,
   PRENOM               char(256) not null,
   EMAIL                char(256),
   PASSWORD             char(256) not null,
   ROLE                 char(256),
   DATEINSCIPTION       timestamp,
   STATUT               bool,
   primary key (IDUSER)
);

alter table BLOG add constraint FK_APPARTIENT foreign key (IDCATEGORIE)
      references CATEGORIE (IDCATEGORIE) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_ASSOCIER foreign key (IDBLOG)
      references BLOG (IDBLOG) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_ECRIRE foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

