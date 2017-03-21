-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Mars 2017 à 15:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `prozzl`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(100) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `rue`, `ville`, `code_postal`) VALUES
(1, '10 rue perceval', 'chy', '73000'),
(2, '11 rue perceval', 'annecy', '74000'),
(3, '12 rue perceval', 'gre', '38000'),
(4, '10 rue perceval', 'chy', '73000'),
(5, '11 rue perceval', 'annecy', '74000'),
(6, '12 rue perceval', 'gre', '38000');

-- --------------------------------------------------------

--
-- Structure de la table `avis_employe`
--

CREATE TABLE IF NOT EXISTS `avis_employe` (
  `id_avis_employe` int(11) NOT NULL AUTO_INCREMENT,
  `note_generale` int(11) DEFAULT NULL,
  `commentaire_avis_employe` varchar(300) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avis_employe`),
  KEY `index_id_employe_avis_employe` (`id_employe`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `avis_employe`
--

INSERT INTO `avis_employe` (`id_avis_employe`, `note_generale`, `commentaire_avis_employe`, `id_employe`, `id_utilisateur`) VALUES
(1, 4, 'Tres bon employé bla bla...', 1, 2),
(2, 5, 'Ninja coool', 2, 2),
(5, 5, 'Nouveau avis sur Alice', 1, 2),
(6, 4, 'Avis sur Vanhove, très mal', 1, 2),
(11, 5, 'Avis sur Vanhove', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `avis_entreprise`
--

CREATE TABLE IF NOT EXISTS `avis_entreprise` (
  `id_avis_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `note_generale` int(11) DEFAULT NULL,
  `commentaire_avis_entreprise` varchar(300) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avis_entreprise`),
  KEY `index_id_entreprise_avis_entreprise` (`id_entreprise`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `avis_entreprise`
--

INSERT INTO `avis_entreprise` (`id_avis_entreprise`, `note_generale`, `commentaire_avis_entreprise`, `id_entreprise`, `id_utilisateur`) VALUES
(1, 4, 'Tres bonne entreprise bla bla...', 1, 1),
(2, 4, 'ouais ouais si si', 1, 1),
(4, 4, 'une bonne entreprise', 1, 1),
(41, 4, 'Avis sur GITHUB', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `competences_cv`
--

CREATE TABLE IF NOT EXISTS `competences_cv` (
  `id_competence` int(11) NOT NULL AUTO_INCREMENT,
  `nom_competence` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `competences_cv`
--

INSERT INTO `competences_cv` (`id_competence`, `nom_competence`) VALUES
(1, 'comp1'),
(2, 'comp2'),
(3, 'comp3'),
(4, 'comp4'),
(5, 'comp1'),
(6, 'comp2'),
(7, 'comp3'),
(8, 'comp4');

-- --------------------------------------------------------

--
-- Structure de la table `criteres_notation_employe`
--

CREATE TABLE IF NOT EXISTS `criteres_notation_employe` (
  `id_critere_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_critere_employe` varchar(30) DEFAULT NULL,
  `critere_note_employe` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_critere_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `criteres_notation_employe`
--

INSERT INTO `criteres_notation_employe` (`id_critere_employe`, `nom_critere_employe`, `critere_note_employe`) VALUES
(1, 'Crit1', 0),
(2, 'Crit2', 1),
(3, 'Crit3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `criteres_notation_entreprise`
--

CREATE TABLE IF NOT EXISTS `criteres_notation_entreprise` (
  `id_critere_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom_critere_entreprise` varchar(30) DEFAULT NULL,
  `critere_note_entreprise` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_critere_entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `criteres_notation_entreprise`
--

INSERT INTO `criteres_notation_entreprise` (`id_critere_entreprise`, `nom_critere_entreprise`, `critere_note_entreprise`) VALUES
(1, 'Crit1', 0),
(2, 'Crit2', 1),
(3, 'Crit3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
  `id_CV` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_CV`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `cv`
--

INSERT INTO `cv` (`id_CV`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Structure de la table `cv_employe`
--

CREATE TABLE IF NOT EXISTS `cv_employe` (
  `id_cv_employe` int(11) NOT NULL AUTO_INCREMENT,
  `niveau_competence` int(11) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `id_competence` int(11) DEFAULT NULL,
  `id_cv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cv_employe`),
  KEY `index_id_employe_CV_employe` (`id_employe`),
  KEY `index_id_critere_CV_critere` (`id_competence`),
  KEY `index_id_cv_cv_employe_cv` (`id_cv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cv_employe`
--

INSERT INTO `cv_employe` (`id_cv_employe`, `niveau_competence`, `id_employe`, `id_competence`, `id_cv`) VALUES
(1, 5, 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_employe` varchar(45) DEFAULT NULL,
  `prenom_employe` varchar(45) DEFAULT NULL,
  `age_employe` int(11) DEFAULT NULL,
  `employe_travaille` tinyint(1) DEFAULT NULL,
  `mail_employe` varchar(70) DEFAULT NULL,
  `telephone_employe` varchar(12) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_employe`),
  KEY `index_id_adresse_employe_adresse` (`id_adresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`id_employe`, `nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, `mail_employe`, `telephone_employe`, `id_adresse`) VALUES
(1, 'Vanhove', 'Alice', 92, 1, 'mamyVanhove@lesMéméduweb.onion', '0661121314', 1),
(2, 'Cadavid', 'Pyjama', 21, 0, 'Pyjama@JuanPablo.colombia', '0605040302', 3);

-- --------------------------------------------------------

--
-- Structure de la table `employe_avis_critere`
--

CREATE TABLE IF NOT EXISTS `employe_avis_critere` (
  `id_employe_avis` int(11) NOT NULL AUTO_INCREMENT,
  `note_employe_avis` int(11) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `id_critere_notation_employe` int(11) DEFAULT NULL,
  `id_avis_employe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_employe_avis`),
  KEY `index_id_critere_avis_critere_entreprise` (`id_critere_notation_employe`),
  KEY `index_id_entreprise_avis_critere_entreprise` (`id_entreprise`),
  KEY `index_id_avis_employe_avis_critere_avis_employe` (`id_avis_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `employe_avis_critere`
--

INSERT INTO `employe_avis_critere` (`id_employe_avis`, `note_employe_avis`, `id_entreprise`, `id_critere_notation_employe`, `id_avis_employe`) VALUES
(1, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entreprise` varchar(45) DEFAULT NULL,
  `nombre_employes` int(11) DEFAULT NULL,
  `recherche_employes` tinyint(1) DEFAULT NULL,
  `mail_entreprise` varchar(70) DEFAULT NULL,
  `telephone_entreprise` varchar(12) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`),
  KEY `index_id_adresse_entreprise_adresse` (`id_adresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `nombre_employes`, `recherche_employes`, `mail_entreprise`, `telephone_entreprise`, `id_adresse`) VALUES
(1, 'Github', 69, 0, 'github@noob.onion', '0696969696', 1),
(3, 'Juanpi', 37, 1, 'test@tes.fr', '808080880', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_avis_critere`
--

CREATE TABLE IF NOT EXISTS `entreprise_avis_critere` (
  `id_entreprise_avis` int(11) NOT NULL AUTO_INCREMENT,
  `note_entreprise_avis` int(11) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `id_critere_notation_entreprise` int(11) DEFAULT NULL,
  `id_avis_entreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_entreprise_avis`),
  KEY `index_id_critere_avis_critere_employe` (`id_critere_notation_entreprise`),
  KEY `index_id_employe_avis_critere_employe` (`id_employe`),
  KEY `index_id_avis_entreprise_avis_critere_avis_entreprise` (`id_avis_entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `entreprise_avis_critere`
--

INSERT INTO `entreprise_avis_critere` (`id_entreprise_avis`, `note_entreprise_avis`, `id_employe`, `id_critere_notation_entreprise`, `id_avis_entreprise`) VALUES
(1, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `travaille`
--

CREATE TABLE IF NOT EXISTS `travaille` (
  `id_travaille` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_contrat` date DEFAULT NULL,
  `date_fin_contrat` date DEFAULT NULL,
  `duree_contrat` int(11) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_travaille`),
  KEY `index_id_employe_travaille_employe` (`id_employe`),
  KEY `index_id_entreprise_travaille_entreprise` (`id_entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `travaille`
--

INSERT INTO `travaille` (`id_travaille`, `date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`) VALUES
(1, '2017-02-01', '2017-03-01', 30, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `id_user_UNIQUE` (`id_utilisateur`),
  KEY `fk_id_employe_utilisateur_employe` (`id_employe`),
  KEY `fk_id_entreprise_utilisateur_entreprise` (`id_entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `mot_de_passe`, `role`, `id_employe`, `id_entreprise`) VALUES
(1, 'CP', 'password', 'employe', 2, NULL),
(2, 'GIT', 'password', 'entreprise', NULL, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis_employe`
--
ALTER TABLE `avis_employe`
  ADD CONSTRAINT `avis_employe_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `fk_id_employe_avis_employe` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `avis_entreprise`
--
ALTER TABLE `avis_entreprise`
  ADD CONSTRAINT `avis_entreprise_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `fk_id_entreprise_avis_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cv_employe`
--
ALTER TABLE `cv_employe`
  ADD CONSTRAINT `fk_id_critere_CV_critere` FOREIGN KEY (`id_competence`) REFERENCES `competences_cv` (`id_competence`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_cv_cv_employe_cv` FOREIGN KEY (`id_cv`) REFERENCES `cv` (`id_CV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_employe_CV_employe` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `fk_id_adresse_employe_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `employe_avis_critere`
--
ALTER TABLE `employe_avis_critere`
  ADD CONSTRAINT `fk_id_avis_employe_avis_critere_avis_employe` FOREIGN KEY (`id_avis_employe`) REFERENCES `avis_employe` (`id_avis_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_critere_avis_critere_entreprise` FOREIGN KEY (`id_critere_notation_employe`) REFERENCES `criteres_notation_employe` (`id_critere_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_entreprise_avis_critere_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_id_adresse_entreprise_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprise_avis_critere`
--
ALTER TABLE `entreprise_avis_critere`
  ADD CONSTRAINT `fk_id_avis_entreprise_avis_critere_avis_entreprise` FOREIGN KEY (`id_avis_entreprise`) REFERENCES `avis_entreprise` (`id_avis_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_critere_avis_critere_employe` FOREIGN KEY (`id_critere_notation_entreprise`) REFERENCES `criteres_notation_entreprise` (`id_critere_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_employe_avis_critere_employe` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `travaille`
--
ALTER TABLE `travaille`
  ADD CONSTRAINT `fk_id_employe_travaille_employe` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_entreprise_ttravaille_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_id_employe_utilisateur_employe` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_entreprise_utilisateur_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
