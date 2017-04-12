<?php
/* @var $this OffreEmploiController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Offre Emplois',
//);
?>




<?php

	$titre ="";

	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise
		$this->menu=array(
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create')) // On peut créer une offre d'emploi
		);

		$titre = "Mes offres d'emplois";

	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé
		/*$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('postuler/index')) // On peut postuler à une offre d'emploie
		);
		*/

		$titre = "Liste des offres d'emplois";

	}
	else 
	{ // Si autre
		$this->menu=array(
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create')), // On peut créer et postuler à une offre d'emploie
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
				print("<p> ID entreprise : ".$value->id_entreprise."</p>");
				print("<p> ID offre : ".$value->id_offre_emploi."</p>");
				print("<p> Date de mise en ligne : ".$this->changeDateNaissance($value->date_creation_offre_emploi)."</p>");
				print("<p> Type de l'offre : ".$value->type_offre_emploi."</p>");
				print("<p> Sallaire proposé : ".$value->salaire_offre_emploi." €</p>");
				print("<p> Expérience nécéssaire : ".$value->experience_offre_emploi."</p>");
				print("<p> Description de l'offre : ".$value->description_offre_emploi."</p>");
				echo "<hr/>";
			}

		}


	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé on affiche toutes les offres d'emploi

		foreach ($model as $key => $value ) //  Pour chaque offre ...
		{
			print("<p> ID entreprise : ".$value->id_entreprise."</p>");
			print("<p> ID offre : ".$value->id_offre_emploi."</p>");
			print("<p> Date de mise en ligne : ".$this->changeDateNaissance($value->date_creation_offre_emploi)."</p>");
			print("<p> Type de l'offre : ".$value->type_offre_emploi."</p>");
			print("<p> Sallaire proposé : ".$value->salaire_offre_emploi." €</p>");
			print("<p> Expérience nécéssaire : ".$value->experience_offre_emploi."</p>");
			print("<p> Description de l'offre : ".$value->description_offre_emploi."</p>");
			?><p><button type="button" href=" /view&id= $value->id_offre_emploi)"> Voir cette offre</button></p><?php
			echo "<hr/>";

		}

		/*
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));
		*/


	}
	else 
	{ // Si autre on affiche toutes les offres d'emploi
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));

	}

?>
