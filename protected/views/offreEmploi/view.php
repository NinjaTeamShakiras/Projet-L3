<?php
/* @var $this OffreEmploiController */
/* @var $model OffreEmploi */

/*$this->breadcrumbs=array(
	'Offre Emplois'=>array('index'),
	$model->id_offre_emploi,
);
*/

$utilisateur = Utilisateur::model()->FindByAttributes(array("login"=> Yii::app()->user->getId()));
if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise on affiche la possibilité de maj/suppr l'offre en question
		$this->menu=array(
			array('label'=>'Créer une offre', 'url'=>array('create')),
			array('label'=>'Modifier ', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
			//Marche pas
			//array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_offre_emploi),'confirm'=>'Êtes vous sur de vouloir supprimer ?')),
		);

	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé on affiche la possibilité de postuler à l'offre en question
		$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('index')),
		);

	}
	else 
	{ // Si autre on affiche toutes les possibilité
		$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('index')),
			array('label'=>'Créer une offre', 'url'=>array('create')),
			array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
			//Marche pas
			//array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_offre_emploi),'confirm'=>'Êtes vous sur de vouloir supprimer ?')),
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

?>



