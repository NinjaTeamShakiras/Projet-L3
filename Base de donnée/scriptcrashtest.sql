--
-- ADRESSE
--
INSERT INTO `prozzl_test`.`adresse`(`rue`, `ville`, `code_postal`)
	VALUES  (	'1 rue Jean Jaurès',			'Annecy',		'74000'	),
			(	'5 rue Notre Dame',				'Annecy',		'74000'	),
			(	'1 place Centenaire',			'Chambery',		'73000'	),
			(	'37 rue Jean Pierre Veyrat',	'Chambery',		'73000'	),
			(	'68 rue Bobby Sands',			'Chambery',		'73000'	),
			(	'191 rue Michaud',				'Chambery',		'73000'	);
		--	         rue 						  ville      	 postal






--
-- AVIS_EMPLOYE
--
INSERT INTO `prozzl_test`.`avis_employe`(`note_generale_avis`, `date_creation`, `nb_signalements`, `id_employe`, `id_utilisateur`)
	VALUES  (	0,		'2017-01-01 01:66:23',		12,		1,		8	),
			(	1,		'2017-02-01 02:66:23',		16,		2,		7	),
			(	2,		'2017-03-01 03:66:23',		15,		3,		6	),
			(	3,		'2017-04-01 04:66:23',		12,		4,		5	),
			(	4,		'2017-05-01 05:66:23',		22,		1,		4	),
			(	5,		'2017-06-01 06:66:23',		5,		2,		3	),
			(	5,		'2017-07-01 07:66:23',		7,		3,		2	),
			(	6,		'2017-08-01 08:66:23',		84,		4,		1	),
			(	7,		'2017-09-01 09:66:23',		45,		1,		8	),
			(	8,		'2017-10-01 10:66:23',		32,		2,		7	),
			(	9,		'2017-11-01 11:66:23',		65,		3,		6	),
			(	10,		'2017-12-01 12:66:23',		32,		4,		5	);
		--	  note 				date      	  signale   idEnt   idUtil






--
-- AVIS_ENTREPRISE
--
INSERT INTO `prozzl_test`.`avis_entreprise`(`note_generale_avis`, `date_creation`, `nb_signalements`, `id_entreprise`, `id_utilisateur`)
	VALUES  (	0,		'2016-01-01 01:66:25',		12,		1,		8	),
			(	1,		'2016-02-01 02:66:25',		16,		2,		7	),
			(	2,		'2016-03-01 03:66:25',		15,		3,		6	),
			(	3,		'2016-04-01 04:66:25',		12,		4,		5	),
			(	4,		'2016-05-01 05:66:25',		22,		1,		4	),
			(	5,		'2016-06-01 06:66:25',		5,		2,		3	),
			(	5,		'2016-07-01 07:66:25',		7,		3,		2	),
			(	6,		'2016-08-01 08:66:25',		84,		4,		1	),
			(	7,		'2016-09-01 09:66:25',		45,		1,		8	),
			(	8,		'2016-10-01 10:66:25',		32,		2,		7	),
			(	9,		'2016-11-01 11:66:25',		65,		3,		6	),
			(	10,		'2016-12-01 12:66:25',		32,		4,		5	);
		--	  note 				date      	  signale   idEnt   idUtil







--
-- COMPETENCES_CV /!\ ne pas remplir !! /!\
--






--
-- CRITERES_NOTATION_EMPLOYE
--
INSERT INTO `prozzl_test`.`criteres_notation_employe`(`nom_critere_employe`, `critere_note`, `description_critere`) 
VALUES  (	"Type de contrat",				 									0, 	"Type de contrat que vous aviez au sein de l'entreprise"														),
		(	"Relation avec les managers",										1, 	"Note de 1 à 10 correspondant à votre relation avec les managers"												),
		(	"Relation avec les collègues",										1, 	"Note de 1 à 10 correspondant à votre relation avec vos collègues"												),
		(	"Politique RH (culture d'entreprise, formations, événements)", 		1, 	"Note de 1 à 10 correspondant à la politique des relations humaines au sein de l'entreprise"					),
		(	"Equilibre entre la vie personelle et professionelle", 				1, 	"Note de 1 à 10 correspondant à l'équilibre entre vos professionelles et personelles"							),
		(	"Qualité des missions / diversité des tâches", 						1, 	"Note de 1 à 10 correspondant à la qualité des missions confiées et la diveristé des tâches effectuées"			),
		(	"Responsabilités / Confiance accordée par l'entreprise", 			1, 	"Note de 1 à 10 correspondant aux responsabilités et à la confiance accordée par l'entreprise"					),
		(	"Niveau de stress", 												1, 	"Note de 1 à 10 correspondant au stress personnel ressenti au sein de l'entreprise"								),
		(	"Opportunités d'évolution", 										1, 	"Note de 1 à 10 correspondant aux opportunités d'évolution proposées par l'entreprise"							),
		(	"Qualité des rétributions financières",								1, 	"Note de 1 à 10 correspondant à la qualité des rétributions financières offertes par l'entreprise"				),
		(	"Points forts à conserver", 										0, 	"Paragraphe de 300 caractères max. expliquant les points forts de l'entreprise que vous encouragez à conserver"	),
		(	"Axes d'amélioration",												0, 	"Paragraphe de 300 caractères max. indiquant les axes d'amélioration que vous suggérez à l'entreprise"			);
		--	  non critère                                                    note 				description





--
-- CRITERES_NOTATION_ENTREPRISE
--
INSERT INTO `prozzl_test`.`criteres_notation_entreprise`(`nom_critere_entreprise`, `critere_note`, `description_critere`)
VALUES  (	"Type de contrat",								0, 	"Type de contrat de l'employé au sin de l'entreprise"																),
		(	"Qualité globale du travail",					1, 	"Note de 1 à 10 correspondantà la qualité du travail de l'employé au sein de l'entreprise"							),
		(	"Relation avec les autres collaborateurs",		1, 	"Note de 1 à 10 correspondant aux relations du salarié avec les autres collaborateurs"								),
		(	"Relation avec les clients",					1, 	"Note de 1 à 10 correspondant aux relations du salarié avec les clients de l'entreprise"							),
		(	"Prises d'initiatives",							1, 	"Note de 1 à 10 correspondant aux prises d'initiatives du salarié au sein de l'entreprise"							),
		(	"Motivation",									1, 	"Note de 1 à 10 correspondant à la motivation du salarié au sein de l'entreprise"									),
		(	"Compétences pour le poste",					1, 	"Note de 1 à 10 correpondant aux compétences du salarié par rapport à son poste au sein de l'entreprise"			),
		(	"Capacité d'évolution / compréhension",			1, 	"Note de 1 à 10 correspondant à la capacité d'évolution et à la capacité de compréhension des tâches du salarié"	),
		(	"Capacite d'adaptation",						1, 	"Note de 1 à 10 correspondant à la capacité d'adaptation de l'employé"												),
		(	"Points forts à conserver",						0, 	"Paragraphe de 300 caractères max. expliquant les points forts du salarié que vous encouragez à conserver"			),
		(	"Axes d'amélioration",							0, 	"Paragraphe de 300 caractères max. indiquant les axes d'amélioration que vous suggérez à l'employé"					);
		--	  non critère                                                    note 				description






--
-- CV /!\ ne pas remplir !! /!\
--




--
-- CV_EMPLOYE /!\ ne pas remplir !! /!\
--






--
-- EMPLOYE
--
INSERT INTO `prozzl_test`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, 			`mail_employe`, 	`telephone_employe`, 	`id_adresse`)
	SELECT 							'Pablo',		'Juan',			 	20,				1,				     'JuanPablo@prozzl.fr',		'0605040302',			id_adresse
		FROM adresse
	WHERE id_adresse = 1 ;

INSERT INTO `prozzl_test`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, 			`mail_employe`, 	`telephone_employe`, 	`id_adresse`)
	SELECT 							'Jean',			'Neige',		 	40,			 	0,				     'JeanNeige@prozzl.fr',		'0606060606',			id_adresse
		FROM adresse
	WHERE id_adresse = 2 ;

INSERT INTO `prozzl_test`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, 			`mail_employe`, 	`telephone_employe`, 	`id_adresse`)
	SELECT 							'Martin',		'Dupont',			30,			 	0,				  'MartinDupont@prozzl.fr',		'0615649789',			id_adresse
		FROM adresse
	WHERE id_adresse = 3 ;

INSERT INTO `prozzl_test`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, 			`mail_employe`, 	`telephone_employe`, 	`id_adresse`)
	SELECT 							'Muraton',		'Francky',			45,				1,				'FranckyMuraton@prozzl.fr',		'0605040302',			id_adresse
		FROM adresse
	WHERE id_adresse = 4 ;

INSERT INTO `prozzl_test`.`employe`(`nom_employe`, `prenom_employe`, `age_employe`, `employe_travaille`, 			`mail_employe`, 	`telephone_employe`, 	`id_adresse`)
	SELECT 							'Sacquet',		'Frodon',			18,				0,				'FrodonSacquet@prozzl.fr',		'0687976434',			id_adresse
		FROM adresse
	WHERE id_adresse = 5 ;	








--
-- EMPLOYE_AVIS_CRITERE
--








--
-- ENTREPRISE
--
INSERT INTO `prozzl`.`entreprise`(`nom_entreprise`, `nombre_employes`, `recherche_employes`, 		`mail_entreprise`, 	`telephone_entreprise`, 	`id_adresse`)
	SELECT 							'Facebook',			1 000 000,			0,					'Facebook@facebook.us',	'0646565646',				id_adresse
		FROM adresse
	WHERE id_adresse = 1;

INSERT INTO `prozzl`.`entreprise`(`nom_entreprise`, `nombre_employes`, `recherche_employes`, 		`mail_entreprise`, 	`telephone_entreprise`, 	`id_adresse`)
	SELECT 							'Linkedin',			2 000 000,			0,					'Linkedin@lkdn.us',		'555-698-485',				id_adresse
		FROM adresse
	WHERE id_adresse = 2;

INSERT INTO `prozzl`.`entreprise`(`nom_entreprise`, `nombre_employes`, `recherche_employes`, 		`mail_entreprise`, 	`telephone_entreprise`, 	`id_adresse`)
	SELECT 							'Github',			70,					0,					'github@github.fr',		'0456879795',				id_adresse
		FROM adresse
	WHERE id_adresse = 3;

INSERT INTO `prozzl`.`entreprise`(`nom_entreprise`, `nombre_employes`, `recherche_employes`, 		`mail_entreprise`, 	`telephone_entreprise`, 	`id_adresse`)
	SELECT 							'Twitter',			500 000,			0,					'Twitter@twitter.uk',	'555-897-456',				id_adresse
		FROM adresse
	WHERE id_adresse = 4;







--
-- ENTREPRISE_AVIS_CRITERE
--
INSERT INTO `prozzl`.`entreprise_avis_critere`(`note_entreprise_avis`, `id_employe`, `id_critere_notation_entreprise`, `id_avis_entreprise`) 
	SELECT 											5, 					id_employe, 	id_critere_entreprise, 			id_avis_entreprise
		FROM employe, criteres_notation_entreprise, avis_entreprise
	WHERE id_employe = 1
    	AND id_critere_entreprise = 1
        AND id_avis_entreprise = 1;







--
-- INFOS_COMPLEMENTAIRES_EMPLOYE
--


--
-- INFOS_COMPLEMENTAIRES_ENTREPRISE
--


--
-- INFOS_COMPLEMENTAIRES_PROFIL
--


--
-- NOTIFICATIONS 
--






--
-- TRAVAILLE
--
INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT 							'2017-02-01', 		'2017-03-01',			30, 		id_employe,		id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 1 AND id_entreprise = 1;

INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT 							'2017-02-01', 		'2017-03-01',			30, 		id_employe, 	id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 2 AND id_entreprise = 2;

INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT 							'2017-02-01', 		'2017-03-01',			30, 		id_employe, 	id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 3 AND id_entreprise = 3;

INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT 							'2017-02-01', 		'2017-03-01',			30,			id_employe, 	id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 4 AND id_entreprise = 4;

INSERT INTO `prozzl`.`travaille`(`date_debut_contrat`, `date_fin_contrat`, `duree_contrat`, `id_employe`, `id_entreprise`)
	SELECT 							'2017-02-01', 		'2017-03-01',			30, 		id_employe, 	id_entreprise
    	FROM employe,entreprise
    WHERE id_employe = 5 AND id_entreprise = 2;







--
-- UTILISATEUR
--
			-- employe
INSERT INTO `prozzl`.`Utilisateur`(		`login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'MF', 			'password', 	'employe', 		id_employe, 		NULL
		FROM employe
	WHERE nom_employe = "Muraton";

INSERT INTO `prozzl`.`Utilisateur`(		`login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'MD', 			'password', 	'employe', 		id_employe,			 NULL
		FROM employe
	WHERE nom_employe = "Martin";

INSERT INTO `prozzl`.`Utilisateur`(		`login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'JN', 			'password', 	'employe', 		id_employe, 		NULL
		FROM employe
	WHERE nom_employe = "Jean";

INSERT INTO `prozzl`.`Utilisateur`(		`login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'PJ', 			'password', 	'employe', 		id_employe, 		NULL
		FROM employe
	WHERE nom_employe = "Pablo";

INSERT INTO `prozzl`.`Utilisateur`(		`login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'SF', 			'password', 	'employe', 		id_employe,			NULL
		FROM employe
	WHERE nom_employe = "Sacquet";



			-- entreprise
INSERT INTO `prozzl`.`Utilisateur`(`	login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'FB', 			'password', 'entreprise', 			NULL,		 id_entreprise
		FROM entreprise
	WHERE nom_entreprise = "Facebook";

INSERT INTO `prozzl`.`Utilisateur`(`	login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'TW', 			'password',	'entreprise',			 NULL, 		id_entreprise
		FROM entreprise
	WHERE nom_entreprise = "Twitter";

INSERT INTO `prozzl`.`Utilisateur`(`	login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'LKDN', 		'password', 'entreprise',			NULL, 		id_entreprise
		FROM entreprise
	WHERE nom_entreprise = "Linkedin";

INSERT INTO `prozzl`.`Utilisateur`(`	login`, 	`mot_de_passe`, 		`role`, 	`id_employe`, 	`id_entreprise`)
	SELECT 								'GIT', 			'password', 'entreprise', 			NULL, 		id_entreprise
		FROM entreprise
	WHERE nom_entreprise = "Github";



