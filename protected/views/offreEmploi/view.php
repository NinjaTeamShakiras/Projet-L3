<?php
/* @var $this OffreEmploiController */
/* @var $model OffreEmploi */

//$this->breadcrumbs=array(
//	'Offre Emplois'=>array('index'),
//	$model->id_offre_emploi,
//);

$utilisateur = Utilisateur::model()->FindByAttributes(array("login"=> Yii::app()->user->getId()));
if($model->id_entreprise == $utilisateur->id_entreprise)
{
	$this->menu=array(
		array('label'=>'List OffreEmploi', 'url'=>array('index')),
		array('label'=>'Create OffreEmploi', 'url'=>array('create')),
		array('label'=>'update OffreEmploi', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
	);
}
?>

<h1>View OffreEmploi #<?php echo $model->id_offre_emploi; ?></h1>

<?php
	$date_creation = $this->changeDateNaissance($model->date_creation_offre_emploi);

	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_offre_emploi',
		array(
			'label'=>'Date de création de l\'offre',
			'value'=>$model->date_creation_offre_emploi != NULL ? $date_creation : "Non renseignée",
			),
		'type_offre_emploi',
		'salaire_offre_emploi',
		'experience_offre_emploi',
		'description_offre_emploi',
		'id_entreprise',
		),
	));





	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise on affiche la possibilité de maj/suppr l'offre en question
		$this->menu=array(
			array('label'=>'Liste des offre d\'emploi', 'url'=>array('index')),
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create')),
			array('label'=>'Modifier l\'offre d\'emploi', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
	);
		
	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé on affiche la possibilité de postuler à l'offre en question

	}

	else 
	{ // Si autre on affiche toutes les possibilité

	}
?>



