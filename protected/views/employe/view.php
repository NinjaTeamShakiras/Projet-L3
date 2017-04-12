<?php
/* @var $this EmployeController */
/* @var $model Employe */


		/* 		Si ce n'est pas le profil de l'utilisateur en cours on ne l'affiche pas		*/
		if($model->id_employe == $this->get_id_utilisateur_connexion(Yii::app()->user->getId())) :
			$this->menu=array(
				array('label'=>'Mettre à jour mon profil', 'url'=>array('update', 'id'=>$model->id_employe)),
				array('label'=>'Supprimer mon profil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_employe),'confirm'=>'Etes-vous sur de vouloir supprimer votre profil?')),
			);
?>
<div>
	<h1>Bonjour <?php echo $model->prenom_employe;?> ,</h1>
	<h2>Bienvenue sur votre profil</h2>
</div> 

<?php  endif; ?>

<div>
	<h1><?php echo $model->nom_employe . " " .$model->prenom_employe;?></h1>
</div>

<?php 

//On passe la date de naissance au format français via une fonction du controller
$date_naissance = $this->changeDateNaissance($model->date_naissance_employe);

$telephone = $this->AfficheTelephone($model->telephone_employe," ");

$emploi = "Non renseigné";
if($model->employe_travaille == 0)
{
	$emploi = "Oui";
}
else if ($model->employe_travaille)
{
	$emploi = "Non";
}

$adresse = "Non renseignée";

if ($model->Adresse->rue != NULL && $model->Adresse->code_postal != NULL && $model->Adresse->ville != NULL)
{
	 $adresse = $model->Adresse->rue.", ".$model->Adresse->code_postal." ".$model->Adresse->ville;
}

$utilisateur = Utilisateur::model()->FindByAttributes(array('id_employe'=>$model->id_employe));


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom_employe',
		'prenom_employe',
		array(
			'label'=>'Date de naissance',
			'value'=> $model->date_naissance_employe != NULL ? $date_naissance : "Non renseignée",
			),
		//On modifie la valeur de employe_travaille
		array(
			'label'=>'Recherche un emploi',
			'value'=>$emploi,
			),
		array(
			'label'=>'Adresse mail',
			'value'=>$utilisateur->mail != NULL ? $utilisateur->mail : "Non renseignée",
			),
		array(
			'label'=>'Télephone',
			'value'=>$model->telephone_employe != NULL ? $telephone : "Non renseigné",
		),
		//On affiche l'adresse en passant par la clé étrangère
		array(
			'label'=>'Adresse',
			'value'=>$adresse,
			),
	),
)); ?>

<?php 
/*			Si l'utilisateur n'est pas un employé 		*/
if(!Utilisateur::est_employe(Yii::app()->user->role)) : ?>


<h2>Laissez votre avis à cet employé</h2>

<?php 
	/*		On affiche les message si l'avis a bien été publié, en gros s'il n'y pas d'erreurs 		*/
	if( Yii::app()->request->getParam('error') != NULL && $_GET['error'] == 0 && !isset( $_GET['update'] ) ) 
		echo '<div class="success-avis-employe" style="margin : 2% 0%; color : green; border: solid 2px green; padding : 2%;" >Votre avis a bien été publié</div>';
	
	if( Yii::app()->request->getParam('error') != NULL && $_GET['error'] == 0 && Yii::app()->request->getParam('update') != NULL &&  $_GET['update'] == true )
		echo '<div class="success-update-avis-employe" style="margin : 2% 0%; color : green; border: solid 2px green; padding : 2%;" >Votre avis a bien été modifié</div>';


	$this->renderPartial('./../avisEmploye/_form', array( 'model' => AvisEmploye::model()) ); 
	endif;
?>

<br/><br/>
<h2>Voici la liste de vos avis :</h2>
<?php 
	/*		Récupérations des informations des autres tables 		*/
	$avis_all = AvisEmploye::model()->findAll( "id_employe = " . $model->id_employe );
?>
	

<div>
<?php 
			/*		On parcourt tous les avis de l'utilisateur pour les afficher 		*/
			foreach ( $avis_all as $key => $avis_obj ) :				?>

				<p>Note générale : <b><?php echo round( $avis_obj->note_generale_avis_employe, 1 ); ?></b></p>

<?php 			$criteresEmploye_array = EmployeAvisCritere::model()->findAll( "id_avis_employe = " . $avis_obj->id_avis_employe ); 		?>

				<ul class="ul-single-avis-<?php print( $avis_obj->id_avis_employe ); ?>">

<?php  			/*			On parcourt chaque critère de l'avis concerné 		*/
				foreach ( $criteresEmploye_array as $key => $critere_obj ) :			?>
<?php 				$critere_notation_obj = CriteresNotationEmploye::model()->findByAttributes( array( "id_critere_employe"=>$critere_obj->id_critere_notation_employe ) );		?>

<?php  				if( !empty( $critere_obj->commentaire_evaluation_critere ) || !is_null( $critere_obj->note_employe_avis ) ) : ?>

						<li><?php print( $critere_notation_obj->nom_critere_employe); ?> : <?php is_null($critere_obj->note_employe_avis) ? print( $critere_obj->commentaire_evaluation_critere ) : print( $critere_obj->note_employe_avis ); ?> </li>

<?php   			endif; 			?>
<?php  			endforeach; 		?>

<?php  			
				/*		Récupération de la personne qui a créé l'avis  		*/
				$auteur_avis_obj = Entreprise::get_entreprise_by_id_utilisateur( $avis_obj->id_utilisateur );  
?>				
				</ul>
				<p>Par : <?php $auteur_avis_obj != NULL ? print( $auteur_avis_obj->nom_entreprise ) :  print( "administrateur" );  ?></p>

<?php  			if ( $avis_obj->id_utilisateur == Utilisateur::get_utilisateur_connexion( Yii::app()->user->getId() )->id_utilisateur ) :	?>
					
					<p><button class="update-avis" id_avis="<?php print( $avis_obj->id_avis_employe ); ?>">Modifier cette avis</button></p>
					<div class="update-form-avis-<?php print( $avis_obj->id_avis_employe ); ?>" style="display: none;">
<?php  					$this->renderPartial('./../avisEmploye/update', array 	( 
																				'model' => AvisEmploye::model(),
																				'avisEmploye_layout' => $avis_obj,
																				'criteresAvis_layout' => $criteresEmploye_array
																			) ); 		?>
					</div>

<?php  			endif; ?>


<?php  		endforeach; 	?>
</div>

<!-- A supprimer pour remmetre dans un vrai fichier .js -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).on( 'click', ".update-avis", function() {
		$(this).hide();
		$( '.ul-single-avis-' + $(this).attr("id_avis") ).hide();
		$( '.update-form-avis-' + $(this).attr("id_avis") ).fadeIn();
	});
	
</script>

