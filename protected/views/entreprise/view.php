<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */

$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entreprise,
);


if($model->id_entreprise == $this->get_id_utilisateur_connexion(Yii::app()->user->getId()))
{
	$this->menu=array(
		array('label'=>'Mettre à jour mon profil', 'url'=>array('update', 'id'=>$model->id_entreprise)),
	);
}
?>


<!-- AFFICHAGE ESPACE PERSO -->

<h1>Votre espace personnel :</h1>

<?php 
	$this->widget('zii.widgets.CDetailView',
		array(
			'data'=>$model,
			'attributes'=>array(
				'nom_entreprise',
				'nombre_employes',
				array(
					'label'=>'Cherche des nouveaux employés',
					'value'=>$model->recherche_employes == 0 ? "Non" : "Oui",
					),
				'mail_entreprise',
				array(
					'label'=>'Télephone',
					'value'=>$model->AfficheTelephone($model->telephone_entreprise," "),
					),
				array(
					'label'=>'Adresse',
					'value'=>$model->Adresse->rue.", ".$model->Adresse->code_postal." ".$model->Adresse->ville,
					),
			),
		)
	);
?>


<?php if(Utilisateur::est_employe(Yii::app()->user->role)) : ?>

<h2>Laissez votre avis à cette entreprise</h2>

<?php 
	$this->renderPartial('./../AvisEntreprise/_form', array( 'model' => AvisEntreprise::model()) ); 
	endif;
?>


<h2>Voici la liste des avis :</h2>

<?php $avis_all = AvisEntreprise::model()->findAll("id_entreprise = " . $model->id_entreprise); ?>
<ul>
<?php foreach ($avis_all as $key => $value) : ?>

		<li><?php AvisEntreprise::afficher_avis($value) ?></li>

<?php endforeach;?>
</ul>


