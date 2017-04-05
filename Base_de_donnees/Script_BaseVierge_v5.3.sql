-- MySQL Script generated by MySQL Workbench
-- Tue Apr  4 09:40:34 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

-- Insertion (Franck) : 05/04/2017 16h30

-- ORDRE D'IMPORTATION
-- ---------------------------------
-- 1) adresse
-- 2) employe
-- 3) entreprise
-- 4) Utilisateur
-- 5) travaille
-- 6) Competences_CV
-- 7) CVa
-- 8) CV_Employe
-- 9) Criteres_Notation_Employe
-- 10) Criteres_notation_entreprise
-- 11) avis_employe
-- 12) avis_entreprise
-- 13) employé_avis_critere
-- 14) entreprise_avis_critere
-- 15) Infos_Complementaires_Profil
-- 16) Infos_Complementaires_Employe
-- 17) Infos_Complementaires_Entreprise
-- 18) Notification
-- 19) Offre_Emploi                         *
-- 20) Postuler                             *
-- ---------------------------------





SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema prozzl_test
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `prozzl_test` ;

-- -----------------------------------------------------
-- Schema prozzl_test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prozzl_test` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `prozzl_test` ;







-- -----------------------------------------------------
-- 1) Table `prozzl_test`.`Adresse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Adresse` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Adresse` (
  `id_adresse` INT NOT NULL AUTO_INCREMENT,
  `rue` VARCHAR(100) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `code_postal` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id_adresse`))
ENGINE = InnoDB;

SHOW WARNINGS;








-- -----------------------------------------------------
-- 2) Table `prozzl_test`.`Employe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Employe` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Employe` (
  `id_employe` INT NOT NULL AUTO_INCREMENT,
  `nom_employe` VARCHAR(45) NOT NULL,
  `prenom_employe` VARCHAR(45) NOT NULL,
  `date_naissance_employe` DATETIME NULL,
  `employe_travaille` TINYINT(1) NULL,
  `telephone_employe` VARCHAR(12) NULL,
  `id_adresse` INT NULL,
  PRIMARY KEY (`id_employe`),
  INDEX `index_id_adresse_employe_adresse` (`id_adresse` ASC),
  CONSTRAINT `fk_id_adresse_employe_adresse`
    FOREIGN KEY (`id_adresse`)
    REFERENCES `prozzl_test`.`Adresse` (`id_adresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 3) Table `prozzl_test`.`Entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Entreprise` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Entreprise` (
  `id_entreprise` INT NOT NULL AUTO_INCREMENT,
  `nom_entreprise` VARCHAR(45) NOT NULL,
  `nombre_employes` INT NULL,
  `recherche_employes` TINYINT(1) NULL,
  `telephone_entreprise` VARCHAR(12) NULL,
  `id_adresse` INT NULL,
  PRIMARY KEY (`id_entreprise`),
  INDEX `index_id_adresse_entreprise_adresse` (`id_adresse` ASC),
  CONSTRAINT `fk_id_adresse_entreprise_adresse`
    FOREIGN KEY (`id_adresse`)
    REFERENCES `prozzl_test`.`Adresse` (`id_adresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 4) Table `prozzl_test`.`Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Utilisateur` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Utilisateur` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) NOT NULL,
  `mot_de_passe` VARCHAR(100) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `date_creation_utilisateur` DATETIME NOT NULL,
  `date_derniere_connexion` DATETIME NOT NULL,
  `mail` VARCHAR(45) NOT NULL,
  `id_employe` INT NULL,
  `id_entreprise` INT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE INDEX `id_user_UNIQUE` (`id_utilisateur` ASC),
  INDEX `fk_id_employe_utilisateur_employe` (`id_employe` ASC),
  INDEX `fk_id_entreprise_utilisateur_entreprise` (`id_entreprise` ASC),
  CONSTRAINT `fk_id_employe_utilisateur_employe`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_entreprise_utilisateur_entreprise`
    FOREIGN KEY (`id_entreprise`)
    REFERENCES `prozzl_test`.`Entreprise` (`id_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 5) Table `prozzl_test`.`Travaille`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Travaille` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Travaille` (
  `id_travaille` INT NOT NULL AUTO_INCREMENT,
  `date_debut_contrat` DATE NOT NULL,
  `date_fin_contrat` DATE NULL,
  `duree_contrat` INT NULL,
  `id_employe` INT NOT NULL,
  `id_entreprise` INT NOT NULL,
  PRIMARY KEY (`id_travaille`),
  INDEX `index_id_employe_travaille_employe` (`id_employe` ASC),
  INDEX `index_id_entreprise_travaille_entreprise` (`id_entreprise` ASC),
  CONSTRAINT `fk_id_employe_travaille_employe`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_entreprise_ttravaille_entreprise`
    FOREIGN KEY (`id_entreprise`)
    REFERENCES `prozzl_test`.`Entreprise` (`id_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 6) Table `prozzl_test`.`Competences_CV`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Competences_CV` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Competences_CV` (
  `id_competence` INT NOT NULL AUTO_INCREMENT,
  `nom_competence` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_competence`))
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 7) Table `prozzl_test`.`CV`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`CV` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`CV` (
  `id_CV` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_CV`))
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 8) Table `prozzl_test`.`CV_Employe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`CV_Employe` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`CV_Employe` (
  `id_cv_employe` INT NOT NULL AUTO_INCREMENT,
  `niveau_competence` INT NOT NULL,
  `id_employe` INT NOT NULL,
  `id_competence` INT NOT NULL,
  `id_cv` INT NOT NULL,
  PRIMARY KEY (`id_cv_employe`),
  INDEX `index_id_employe_CV_employe` (`id_employe` ASC),
  INDEX `index_id_critere_CV_critere` (`id_competence` ASC),
  INDEX `index_id_cv_cv_employe_cv` (`id_cv` ASC),
  CONSTRAINT `fk_id_employe_CV_employe`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_critere_CV_critere`
    FOREIGN KEY (`id_competence`)
    REFERENCES `prozzl_test`.`Competences_CV` (`id_competence`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_cv_cv_employe_cv`
    FOREIGN KEY (`id_cv`)
    REFERENCES `prozzl_test`.`CV` (`id_CV`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 9) Table `prozzl_test`.`Criteres_Notation_Employe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Criteres_Notation_Employe` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Criteres_Notation_Employe` (
  `id_critere_employe` INT NOT NULL AUTO_INCREMENT,
  `nom_critere_employe` VARCHAR(30) NOT NULL,
  `critere_note_employe` TINYINT(1) NOT NULL,
  `description_critere_employe` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_critere_employe`))
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 10) Table `prozzl_test`.`Criteres_Notation_Entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Criteres_Notation_Entreprise` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Criteres_Notation_Entreprise` (
  `id_critere_entreprise` INT NOT NULL AUTO_INCREMENT,
  `nom_critere_entreprise` VARCHAR(30) NOT NULL,
  `critere_note_entreprise` TINYINT(1) NOT NULL,
  `description_critere_entreprise` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_critere_entreprise`))
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 11) Table `prozzl_test`.`Avis_Employe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Avis_Employe` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Avis_Employe` (
  `id_avis_employe` INT NOT NULL AUTO_INCREMENT,
  `note_generale_avis_employe` INT NOT NULL,
  `date_creation_avis_employe` DATETIME NOT NULL,
  `nb_signalements_avis_employe` VARCHAR(300) NOT NULL,
  `id_employe` INT NOT NULL,
  `id_utilisateur` INT NOT NULL,
  PRIMARY KEY (`id_avis_employe`),
  INDEX `index_id_employe_avis_employe` (`id_employe` ASC),
  INDEX `index_id_utilisateur_avis_employeutilisateur` (`id_utilisateur` ASC),
  CONSTRAINT `fk_id_employe_avis_employe`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_utilisateur_avis_employe_utilisateur`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `prozzl_test`.`Utilisateur` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 12) Table `prozzl_test`.`Avis_Entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Avis_Entreprise` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Avis_Entreprise` (
  `id_avis_entreprise` INT NOT NULL AUTO_INCREMENT,
  `note_generale_avis_entreprise` INT NOT NULL,
  `date_creation_avis_entreprise` DATETIME NOT NULL,
  `nb_signalements_avis_entreprise` INT NOT NULL,
  `id_entreprise` INT NOT NULL,
  `id_utilisateur` INT NOT NULL,
  PRIMARY KEY (`id_avis_entreprise`),
  INDEX `index_id_entreprise_avis_entreprise` (`id_entreprise` ASC),
  INDEX `index_id_utilisateur_utilisateur` (`id_utilisateur` ASC),
  CONSTRAINT `fk_id_entreprise_avis_entreprise`
    FOREIGN KEY (`id_entreprise`)
    REFERENCES `prozzl_test`.`Entreprise` (`id_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_utilisateur_utilisateur`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `prozzl_test`.`Utilisateur` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 13) Table `prozzl_test`.`Employe_Avis_Critere`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Employe_Avis_Critere` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Employe_Avis_Critere` (
  `id_employe_avis` INT NOT NULL AUTO_INCREMENT,
  `note_employe_avis` INT NULL,
  `commentaire_evaluation_critere` VARCHAR(300) NULL,
  `id_critere_notation_employe` INT NOT NULL,
  `id_avis_employe` INT NOT NULL,
  PRIMARY KEY (`id_employe_avis`),
  INDEX `index_id_critere_avis_critere_entreprise` (`id_critere_notation_employe` ASC),
  INDEX `index_id_avis_employe_avis_critere_avis` (`id_avis_employe` ASC),
  CONSTRAINT `fk_id_critere_avis_critere_entreprise`
    FOREIGN KEY (`id_critere_notation_employe`)
    REFERENCES `prozzl_test`.`Criteres_Notation_Employe` (`id_critere_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_avis_employe_avis_critere_avis`
    FOREIGN KEY (`id_avis_employe`)
    REFERENCES `prozzl_test`.`Avis_Employe` (`id_avis_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 14) Table `prozzl_test`.`Entreprise_Avis_Critere`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Entreprise_Avis_Critere` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Entreprise_Avis_Critere` (
  `id_entreprise_avis` INT NOT NULL AUTO_INCREMENT,
  `note_entreprise_avis` INT NULL,
  `commentaire_evaluation_critere` VARCHAR(300) NULL,
  `id_critere_notation_entreprise` INT NOT NULL,
  `id_avis_entreprise` INT NOT NULL,
  PRIMARY KEY (`id_entreprise_avis`),
  INDEX `index_id_critere_avis_critere_employe` (`id_critere_notation_entreprise` ASC),
  INDEX `index_id_avis_entreprise_avis_critere_avis_entreprise` (`id_avis_entreprise` ASC),
  CONSTRAINT `fk_id_critere_avis_critere_employe`
    FOREIGN KEY (`id_critere_notation_entreprise`)
    REFERENCES `prozzl_test`.`Criteres_Notation_Entreprise` (`id_critere_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_avis_entreprise_avis_critere_avis_entreprise`
    FOREIGN KEY (`id_avis_entreprise`)
    REFERENCES `prozzl_test`.`Avis_Entreprise` (`id_avis_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 15) Table `prozzl_test`.`Infos_Complementaires_Profil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Infos_Complementaires_Profil` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Infos_Complementaires_Profil` (
  `id_info` INT NOT NULL AUTO_INCREMENT,
  `nom_info` VARCHAR(150) NOT NULL,
  `personne_concernee` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id_info`))
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 16) Table `prozzl_test`.`Infos_Complementaires_Employe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Infos_Complementaires_Employe` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Infos_Complementaires_Employe` (
  `id_info_employe` INT NOT NULL AUTO_INCREMENT,
  `description_info` VARCHAR(150) NOT NULL,
  `id_info_profil` INT NOT NULL,
  `id_employe` INT NOT NULL,
  PRIMARY KEY (`id_info_employe`),
  INDEX `idx_id_info_profil_info_employe` (`id_info_profil` ASC),
  INDEX `idx_id_employe_info_employe` (`id_employe` ASC),
  CONSTRAINT `fk_id_info_profil_info_employe`
    FOREIGN KEY (`id_info_profil`)
    REFERENCES `prozzl_test`.`Infos_Complementaires_Profil` (`id_info`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_employe_info_employe`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 17) Table `prozzl_test`.`Infos_Complementaires_Entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Infos_Complementaires_Entreprise` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Infos_Complementaires_Entreprise` (
  `id_info_entreprise` INT NOT NULL AUTO_INCREMENT,
  `description_info` VARCHAR(150) NOT NULL,
  `id_info_profil` INT NOT NULL,
  `id_entreprise` INT NOT NULL,
  PRIMARY KEY (`id_info_entreprise`),
  INDEX `idx_info_profil_info_entreprise` (`id_info_profil` ASC),
  INDEX `idx_id_entreprise_info_entreprise` (`id_entreprise` ASC),
  CONSTRAINT `fk_id_info_profil_info_entreprise`
    FOREIGN KEY (`id_info_profil`)
    REFERENCES `prozzl_test`.`Infos_Complementaires_Profil` (`id_info`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_entreprise_info_entreprise`
    FOREIGN KEY (`id_entreprise`)
    REFERENCES `prozzl_test`.`Entreprise` (`id_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 18) Table `prozzl_test`.`Notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Notifications` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Notifications` (
  `id_notifcation` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `texte_descriptif` VARCHAR(300) NULL,
  `id_utilisateur` INT NOT NULL,
  PRIMARY KEY (`id_notifcation`),
  INDEX `idx_id_utilisateur_notifcation_utilisateur` (`id_utilisateur` ASC),
  CONSTRAINT `fk_id_utilisateur_notifcations_utilisateur`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `prozzl_test`.`Utilisateur` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 19) Table `prozzl_test`.`Offre_Emploi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Offre_Emploi` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Offre_Emploi` (
  `id_offre_emploi` INT NOT NULL AUTO_INCREMENT,
  `date_creation_offre_emploi` DATETIME NOT NULL,
  `type_offre_emploi` VARCHAR(30) NULL,
  `salaire_offre_emploi` INT NULL,
  `experience_offre_emploi` VARCHAR(500) NULL,
  `description_offre_emploi` VARCHAR(500) NULL,
  `id_entreprise` INT NOT NULL,
  PRIMARY KEY (`id_offre_emploi`),
  INDEX `index_id_entreprise` (`id_entreprise` ASC),
  CONSTRAINT `fk_id_entreprise`
    FOREIGN KEY (`id_entreprise`)
    REFERENCES `prozzl_test`.`Entreprise` (`id_entreprise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;







-- -----------------------------------------------------
-- 20) Table `prozzl_test`.`Postuler`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prozzl_test`.`Postuler` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `prozzl_test`.`Postuler` (
  `id_postuler` INT NOT NULL AUTO_INCREMENT,
  `id_employe` INT NOT NULL,
  `id_offre_emploi` INT NOT NULL,
  PRIMARY KEY (`id_postuler`),
  INDEX `index_id_employe` (`id_employe` ASC),
  INDEX `index_id_offre_emploi` (`id_offre_emploi` ASC),
  CONSTRAINT `fk_id_emplye`
    FOREIGN KEY (`id_employe`)
    REFERENCES `prozzl_test`.`Employe` (`id_employe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_offre_emploi`
    FOREIGN KEY (`id_offre_emploi`)
    REFERENCES `prozzl_test`.`Offre_Emploi` (`id_offre_emploi`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
