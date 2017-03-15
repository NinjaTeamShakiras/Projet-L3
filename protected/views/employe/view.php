<?php
/* @var $this EmployeController */
/* @var $model Employe */

$this->breadcrumbs=array(
	'Employes'=>array('index'),
	$model->id_employe,
);


/* 		Si ce n'est pas le profil de l'utilisateur en cours on ne l'affiche pas		*/

if($model->id_employe == $this->get_id_utilisateur_connexion(Yii::app()->user->getId()))
{
	$this->menu=array(
		array('label'=>'Mettre à jour mon profil', 'url'=>array('update', 'id'=>$model->id_employe)),
		array('label'=>'Supprimer mon profil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_employe),'confirm'=>'Etes-vous sur de vouloir supprimer votre profil?')),
	);
}
?>

<p>
<h1>Bonjour <?php echo $model->prenom_employe;?> ,</h1>
<h2>Bienvenue sur votre profil</h2>
</p> 


<h6>Données de mon profil</h6>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom_employe',
		'prenom_employe',
		'age_employe',
		//On modifie la valeur de employe_travaille
		array(
			'label'=>'Recherche un emploi',
			'value'=>$model->employe_travaille == 0 ? "Oui" : "Non",
			),
		'mail_employe',
		array(
			'label'=>'Télephone',
			'value'=>$model->AfficheTelephone($model->telephone_employe," "),
		),
		//On affiche l'adresse en passant par la clé étrangère
		array(
			'label'=>'Adresse',
			'value'=>$model->Adresse->rue.", ".$model->Adresse->code_postal." ".$model->Adresse->ville,
			),
	),
)); ?>

<?php if(!Utilisateur::est_employe(Yii::app()->user->role)) : ?>

<h2>Laissez votre avis à cet employé</h2>

<?php 
	$this->renderPartial('./../avisEmploye/_form', array( 'model' => AvisEmploye::model()) ); 
	endif;
?>

<br/><br/>
<h2>Voici la liste des avis :</h2>

<?php $avis_all = AvisEmploye::model()->findAll("id_employe = " . $model->id_employe); ?>
<ul>

<?php foreach ($avis_all as $key => $value) : ?>

		<li><?php AvisEmploye::afficher_avis($value); ?></li>

<?php endforeach; ?>
</ul>
