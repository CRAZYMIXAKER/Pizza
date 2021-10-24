drop database IF EXISTS Pizza;
CREATE DATABASE IF NOT EXISTS Pizza;

use Pizza;


CREATE TABLE Size 
(
  IDSize INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Dimension INT NOT NULL,
  Price INT NOT NULL
);

CREATE TABLE Souse 
(
  IDSouse INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  NameSouse varchar(30) NOT NULL,
  Price INT NOT NULL
);

CREATE TABLE Type 
(
  IDType INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  NameType varchar(30) NOT NULL,
  Price INT NOT NULL
);

CREATE TABLE Pizza 
(
  IDPizza INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Id_Size INT NOT NULL,
  Id_Souse INT NOT NULL,
  Id_Type INT NOT NULL,
  DateTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Price INT NOT NULL,

  FOREIGN KEY (Id_Size) REFERENCES Size (IDSize),
  FOREIGN KEY (Id_Souse) REFERENCES Souse (IDSouse),
  FOREIGN KEY (Id_Type) REFERENCES Type (IDType)
);


INSERT Size
(Dimension, Price)
VALUES
(21,1),
(26,2),
(31,3),
(45,4);

INSERT Souse
(NameSouse, Price)
VALUES
('Сырный',1),
('Кисло-Сладкий',2),
('Чесночный',3),
('Барбекю',4);

INSERT Type
(NameType, Price)
VALUES
('Пепперони',1),
('Деревенская',2),
('Гавайская',3),
('Грибная',4);