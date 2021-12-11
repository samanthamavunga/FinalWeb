Create database TOM36782022;
Use  TOM36782022;


Create table Sales(SalesCode varchar(10) not null,
Productname varchar(25),
Revenue varchar(13),
Onlinepurchases varchar(13),
Walk_inpurchases varchar(13),
primary key(SalesCode));


Create table Product(Productcode varchar(10) not null,
Salescode varchar(10) not null,
Productname varchar(25),
Price varchar(6),
Targetdemographic varchar(20),
primary key(Productcode),
foreign key(Salescode) references Sales(Salescode));

Create table Clients(ClientID varchar(10) not null,
Demographic varchar(20),
Advertisementmedium varchar(20),
primary key(ClientID));

Create table Orders(OrderID varchar(10) not null,
ClientID varchar(10) not null,
Productcode varchar(10) not null,
Productname varchar(25),
Purchasemode varchar(20),
primary key(OrderID),
foreign key(ClientID) references Clients(ClientID),
foreign key(Productcode) references Product(Productcode));

Create table Has(OrderID varchar(10) not null,
Productcode varchar(10) not null,
Totalorders varchar(13),
primary key(OrderID),
foreign key(Productcode) references Product(Productcode));

Create table Client_Product(ClientID varchar(10) not null,
Productcode varchar(10) not null,
Purchasedthrough varchar(20),
foreign key(ClientID) references Clients(ClientID),
foreign key(Productcode) references Product(Productcode));



Create table Advertisementmedium(CategoryID varchar(10) not null,
SalesCode varchar(10) not null,
Category varchar(20),
Cost varchar(13),
Traffic varchar(13),
Target varchar(20),
primary key(CategoryID),
foreign key(SalesCode) references Sales(SalesCode));

Create table Client_AdvertisementMedium(CAMID varchar(10) not null,
CategoryID varchar(10) not null,
Client_visit_date date,
Mediumcategory varchar(20),
primary key(CAMID),
foreign key(CategoryID) references Advertisementmedium(CategoryID));

Create table Has_visited(CAMID varchar(10) not null,
ClientID varchar(10) not null,
visits_per_month varchar(6),
foreign key(CAMID) references Client_AdvertisementMedium(CAMID),
foreign key(ClientID) references Clients(ClientID));






























































