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
			//array('label'=>'Créer une offre', 'url'=>array('create')),
			array('label'=>'Modifier ', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
			//Marche pas
			//array('label'=>'Supprimer', 'url'=>array('delete','id'=>$model->id_offre_emploi)),
			//array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_offre_emploi),'confirm'=>'Vous êtes sur le point de supprimer, voulez vous continuer ?')),
		);

	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé on affiche la possibilité de postuler à l'offre en question
		$tablePostuler = Postuler::model()->FindAll();
		$aPostuler = false;
		foreach($tablePostuler as $postuler)
		{
			if($postuler->id_offre_emploi == $model->id_offre_emploi && $postuler->id_employe == $utilisateur->id_employe )
			{
				$aPostuler = true;
			}
		}

		if($aPostuler)
		{
			$this->menu=array(
				array('label'=>'Dépostuler', 'url'=>array('depostule', 'id_offre'=>$model->id_offre_emploi)), 
			);
		}
		else
		{
			$this->menu=array(
				array('label'=>'Postuler', 'url'=>array('postule', 'id_offre'=>$model->id_offre_emploi)), 
			);
		}
		
	}
	else 
	{ // Si autre on affiche toutes les possibilité
		$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('index')),
			array('label'=>'Créer une offre', 'url'=>array('create')),
			array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->id_offre_emploi)),
			//Marche pas
			//array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_offre_emploi),'confirm'=>'Vous êtes sur le point de supprimer, voulez vous continuer ?')),
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


	/*		Message de postulation	*/
	if( Yii::app()->request->getParam( 'postule' ) != NULL && Yii::app()->request->getParam( 'postule' ) == "true" ) 
		echo '<div class="success-avis-employe" style="margin : 2% 0%; color : blue; border: solid 2px blue; padding : 2%;" >Vous avez bien postuler à cette offre</div>';


	/*		Message de suppression d'une offre 		*/
	if( Yii::app()->request->getParam( 'delete' ) != NULL && Yii::app()->request->getParam( 'delete' ) == "true" ) 
		echo '<div class="success-avis-employe" style="margin : 2% 0%; color : blue; border: solid 2px blue; padding : 2%;" >Votre offre a bien été supprimé</div>';

?>



