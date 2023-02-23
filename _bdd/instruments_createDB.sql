CREATE DATABASE IF NOT EXISTS `instruments` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8mb4_general_ci;
USE `instruments`;

CREATE TABLE `categorie` (
  `id_cat`  INT NOT NULL AUTO_INCREMENT,
  `type_cat` VARCHAR(50) NOT NULL,
  `descript_cat` VARCHAR(150),
  `img_cat` VARCHAR(250),
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `client` (
  `id_clt`  INT NOT NULL AUTO_INCREMENT,
  `nom_clt` VARCHAR(75) NOT NULL,
  `prenom_clt` VARCHAR(75),
  `mail_clt` VARCHAR(150) NOT NULL,
  `adresse_clt` VARCHAR(200) NOT NULL,
  `cp_clt` int NOT NULL,
  `ville_clt` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `commande` (
  `id_cde`  INT NOT NULL AUTO_INCREMENT,
  `date_cde` DATE,
  `statut_cde` VARCHAR(15),
  `montant`  float(10,2),
  `id_clt` int NOT NULL,
  PRIMARY KEY (`id_cde`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `concerne_instrument_cde` (
  `id_inst` int NOT NULL,
  `id_cde` int NOT NULL,
  `qtite_cde` int,
  PRIMARY KEY (`id_inst`, `id_cde`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `fournisseur` (
  `id_fournisseur` INT NOT NULL AUTO_INCREMENT,
  `nom_contact_fournisseur` VARCHAR(100),
  `tel_contact_fournisseur` VARCHAR(42),
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `instrument` (
  `id_inst` INT NOT NULL AUTO_INCREMENT,
  `nom_inst` VARCHAR(100) NOT NULL,
  `fabricant_inst` VARCHAR(100),
  `ref_fabricant_inst` VARCHAR(20),
  `descript_inst` VARCHAR(250),
  `prix_inst` int NOT NULL,
  `img_inst` VARCHAR(500),
  `nb_stock_inst` int,
  `id_cat` int NOT NULL,
  PRIMARY KEY (`id_inst`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `livre_fournisseur_instrument` (
  `id_inst` INT NOT NULL AUTO_INCREMENT,
  `id_fournisseur` int NOT NULL,
  `qtite_appro` int,
  `date_appro` date,
  PRIMARY KEY (`id_inst`, `id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `spec_livraison` (
  `id_liv` int NOT NULL,
  `adresse_liv` VARCHAR(150),
  `code_liv` int(11),
  `ville_liv` VARCHAR(100),
  `complement_liv` VARCHAR(250),
  `id_clt` int NOT NULL,
  PRIMARY KEY (`id_liv`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

ALTER TABLE `commande` ADD FOREIGN KEY (`id_clt`) REFERENCES `CLIENT` (`id_clt`);
ALTER TABLE `concerne_instrument_cde` ADD FOREIGN KEY (`id_cde`) REFERENCES `commande` (`id_cde`);
ALTER TABLE `concerne_instrument_cde` ADD FOREIGN KEY (`id_inst`) REFERENCES `INSTRUMENT` (`id_inst`);
ALTER TABLE `instrument` ADD FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);
ALTER TABLE `livre_fournisseur_instrument` ADD FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`);
ALTER TABLE `livre_fournisseur_instrument` ADD FOREIGN KEY (`id_inst`) REFERENCES `instrument` (`id_inst`);
ALTER TABLE `spec_livraison` ADD FOREIGN KEY (`id_clt`) REFERENCES `CLIENT` (`id_clt`);