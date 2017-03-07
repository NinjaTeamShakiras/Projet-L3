-- Insertions jeus de tests en BDD

--
-- ADRESSE
--
INSERT INTO `prozzl`.`adresse`(`rue`, `ville`, `code_postal`)
	VALUES  ('10 rue perceval','chy','73000'),
			('11 rue perceval','annecy','74000'),
			('12 rue perceval','gre','38000');


--
-- COMPETENCES_CV
--
INSERT INTO `prozzl`.`competences_cv`(`nom_competence`)
	VALUES  ('comp1'),
			('comp2'),
			('comp3'),
			('comp4');


--
-- CV
--
INSERT INTO `prozzl`.`cv`() 
	VALUES (),
		   (),
		   ();



--
-- EMPLOYE
--
INSERT INTO `prozzl`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, `mail_employe`, `telephone_employe`, `id_adresse`)
	SELECT 'Vanhove', 'Alice', '92', 1, 'mamyVanhove@lesMéméduweb.onion', '0661121314', id_adresse
    	FROM adresse
    WHERE id_adresse = 1;

INSERT INTO `prozzl`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, `mail_employe`, `telephone_employe`, `id_adresse`)
	SELECT 'Cadavid', 'Pyjama', '21', 0, 'Pyjama@JuanPablo.colombia', '0605040302', id_adresse
    	FROM adresse
    WHERE id_adresse = 3;    


--
-- CV_EMPLOYE
--
INSERT INTO `prozzl`.`cv_employe`(`niveau_competence`, `id_employe`, `id_competence`, `id_cv`)
	SELECT 5, id_employe, id_competence, id_cv
    	FROM employe,competences_cv,cv
    WHERE id_employe = 1
    	AND id_competence = 2
        AND id_cv = 2;


--
-- ENTREPRISE
--
INSERT INTO `prozzl`.`entreprise`(`nom_entreprise`, `nombre_employes`, `recherche_employes`, `mail_entreprise`, `telephone_entreprise`, `id_adresse`)
	SELECT 'Github',69,0,'github@noob.onion','0696969696',id_adresse
		FROM adresse
	WHERE id_adresse = 1;


--
-- TRAVAILLE
--
INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT '2017-02-01', '2017-03-01',30, id_employe, id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 1 AND id_entreprise = 1;


--
-- CRITERE_NOTATION_EMPLOYE
--
INSERT INTO `prozzl`.`criteres_notation_employe` (`nom_critere_employe`, `critere_note_employe`) 
	VALUES ('Crit1', '0'),
		   ('Crit2', '1'),
		   ('Crit3', '0');


--
-- CRITERE_NOTATION_ENTREPRISE
--
INSERT INTO `prozzl`.`criteres_notation_entreprise` (`nom_critere_entreprise`, `critere_note_entreprise`) 
	VALUES ('Crit1', '0'),
		   ('Crit2', '1'),
		   ('Crit3', '0');


--
-- AVIS_EMPLOYE
--
INSERT INTO `prozzl`.`avis_employe`(`note_generale`, `commentaire_avis_employe`, `id_employe`) 
	SELECT 4, 'Tres bon employé bla bla...', id_employe
    	FROM employe
    WHERE id_employe = 1;


--
-- AVIS_ENTREPRISE
--
INSERT INTO `prozzl`.`avis_entreprise`(`note_generale`, `commentaire_avis_entreprise`, `id_entreprise`) 
	SELECT 4, 'Tres bon employé bla bla...', id_entreprise
    	FROM entreprise
    WHERE id_entreprise = 1;


--
-- EMPLOYE_AVIS_CRITERE
--
INSERT INTO `prozzl`.`employe_avis_critere`(`note_employe_avis`, `id_entreprise`, `id_critere_notation_employe`, `id_avis_employe`) 
	SELECT 5, id_entreprise, id_critere_employe, id_avis_employe
		FROM entreprise, criteres_notation_employe, avis_employe
	WHERE id_entreprise = 1
    	AND id_critere_employe = 1
        AND id_avis_employe = 1;


--
-- ENTREPRISE_AVIS_CRITERE
--
INSERT INTO `prozzl`.`entreprise_avis_critere`(`note_entreprise_avis`, `id_employe`, `id_critere_notation_entreprise`, `id_avis_entreprise`) 
	SELECT 5, id_employe, id_critere_entreprise, id_avis_entreprise
		FROM employe, criteres_notation_entreprise, avis_entreprise
	WHERE id_employe = 1
    	AND id_critere_entreprise = 1
        AND id_avis_entreprise = 1;


--
-- UTILISATEUR
--
INSERT INTO `prozzl`.`Utilisateur`(`login`, `mot_de_passe`, `role`, `id_employe`, `id_entreprise`)
	SELECT 'CP', 'password', 'employe', id_employe, NULL
		FROM employe
	WHERE id_employe = 2;

INSERT INTO `prozzl`.`Utilisateur`(`login`, `mot_de_passe`, `role`, `id_employe`, `id_entreprise`)
	SELECT 'GIT', 'password', 'entreprise', NULL, id_entreprise
		FROM entreprise
	WHERE id_entreprise = 1;