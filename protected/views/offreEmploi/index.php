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
		$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('postuler/index')) // On peut postuler à une offre d'emploie
		);

		$titre = "Liste des offres d'emplois";

	}
	else 
	{ // Si autre
		$this->menu=array(
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create')), // On peut créer et postuler à une offre d'emploie
			array('label'=>'Postuler', 'url'=>array('postuler/index')),
		);

		$titre = "Liste des offres d'emplois";

	}


?>



<h1><?php echo $titre?></h1> <!-- Titre page -->




<?php
	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise on affiche les offres d'emploi de l'entreprise
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));

	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé on affiche toutes les offres d'emploi
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));

	}
	else 
	{ // Si autre on affiche toutes les offres d'emploi
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));

	}

?>
