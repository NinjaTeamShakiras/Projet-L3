<?php
/* @var $this OffreEmploiController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Offre Emplois',
//);

	$titre ="";

	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise
		$this->menu=array(
			array('label'=>'Créer une offre', 'url'=>array('create')), // On peut créer une offre d'emploi
		);

		$titre = "Mes offres d'emplois";

	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé
		$this->menu=array(
			array('label'=>'Voir mes offres d\'emplois', 'url'=>array('/offreEmploi/mesOffres')), // Voir les offre d'emplois au quel l'employé à postulé
		);
		$titre = "Liste des offres d'emplois";

	}
	else 
	{ // Si autre
		$this->menu=array(
			array('label'=>'Créer une offre', 'url'=>array('create')), // On peut créer et postuler à une offre d'emploie
		);

		$titre = "Liste des offres d'emplois";
	}

?>



<h1><?php echo $titre?></h1> <!-- Titre page -->



<?php
	$login = Yii::app()->user->getId();
	$utilisateur = Utilisateur::model()->FindByAttributes(array("login"=>$login)); // Récupération de l'utilisateur
	$model = OffreEmploi::model()->FindAll(); // Récupération de toutes les offres


	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise on affiche les offres d'emploi de l'entreprise
		
		
		foreach ($model as $key => $value ) // Pour chaque offre ...
		{

			if($value->id_entreprise == $utilisateur->id_entreprise) // Si l'id de l'entreprise de l'offre correspond à l'idée de l'entreprise logée
			{
				//print("<p> ID entreprise : ".$value->id_entreprise."</p>");
				//print("<p> ID offre : ".$value->id_offre_emploi."</p>");
				print("<p> Date de mise en ligne : ".$this->changeDateNaissance($value->date_creation_offre_emploi)."</p>");
				print("<p> Type de l'offre : ".$value->type_offre_emploi."</p>");
				print("<p> Sallaire proposé : ".$value->salaire_offre_emploi." €</p>");
				print("<p> Expérience nécéssaire : ".$value->experience_offre_emploi."</p>");
				print("<p> Description de l'offre : ".$value->description_offre_emploi."</p>");
				echo CHtml::link('Voir cette offre' ,array('offreEmploi/view', 'id'=>$value->id_offre_emploi));
				echo "<hr/>";
			}

		}


	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))
	{  // Si employé on affiche toutes les offres d'emploi
		$tablePostuler = Postuler::model()->FindAll();
		

		foreach ($model as $key => $offre ) //  Pour chaque offre on affiche :
		{
			$entreprise = entreprise::model()->FindByAttributes(array("id_entreprise"=>$offre->id_entreprise)); // On récupère l'entreprise qui propose l'offre

			//print("<p> ID entreprise : ".$offre->id_entreprise."</p>");
			//print("<p> ID offre : ".$offre->id_offre_emploi."</p>");
			print("<p> Proposé par : ".$entreprise->nom_entreprise."</p>");
			print("<p> Date de mise en ligne : ".$this->changeDateNaissance($offre->date_creation_offre_emploi)."</p>");
			print("<p> Type de l'offre : ".$offre->type_offre_emploi."</p>");
			print("<p> Sallaire proposé : ".$offre->salaire_offre_emploi." €</p>");
			print("<p> Expérience nécéssaire : ".$offre->experience_offre_emploi."</p>");
			print("<p> Description de l'offre : ".$offre->description_offre_emploi."</p>");
			foreach($tablePostuler as $postuler)
			{
				if($postuler->id_employe == $utilisateur->id_employe && $postuler->id_offre_emploi == $offre->id_offre_emploi )
				{
					print("<p> Vous avez postuler à cette offre le : ".$this->changeDateNaissance($postuler->date_postule)."</p>");
				}
			}
			echo CHtml::link('Voir cette offre' ,array('offreEmploi/view', 'id'=>$offre->id_offre_emploi));
			echo "<hr/>";
		}

	}
	else 
	{ // Si autre on affiche toutes les offres d'emploi
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));

	}

?>
