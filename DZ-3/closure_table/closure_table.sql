create table menu
(
  idEntry int auto_increment
    primary key,
  name    varchar(100) not null
);

create table items_menu
(
  id           int auto_increment
    primary key,
  idAncestor   int default '0' not null,
  idDescendant int default '0' not null,
  level        int default '0' not null,
  constraint FK_items_menu_menu
  foreign key (idDescendant) references menu (idEntry)
);
