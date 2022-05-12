DROP TABLE IF EXISTS Client ;
CREATE TABLE Client (id_client_Client INT AUTO_INCREMENT NOT NULL,
nom_Client TEXT,
prenom_Client TEXT,
adresse_Client TEXT,
code_postal_Client INT,
ville_Client TEXT,
PRIMARY KEY (id_client_Client)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Commande ;
CREATE TABLE Commande (id_commande_Commande INT AUTO_INCREMENT NOT NULL,
date_Commande TEXT,
adresse_livraison_Commande TEXT,
id_client_Client INT,
id_produit_Produit INT,
PRIMARY KEY (id_commande_Commande)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Produit ;
CREATE TABLE Produit (id_produit_Produit INT AUTO_INCREMENT NOT NULL,
code_produit_Produit TEXT,
libelle_Produit TEXT,
prix_unitaire_Produit FLOAT,
PRIMARY KEY (id_produit_Produit)) ENGINE=InnoDB;

ALTER TABLE Commande ADD CONSTRAINT FK_Commande_id_client_Client FOREIGN KEY (id_client_Client) REFERENCES Client (id_client_Client);

ALTER TABLE Commande ADD CONSTRAINT FK_Commande_id_produit_Produit FOREIGN KEY (id_produit_Produit) REFERENCES Produit (id_produit_Produit);
