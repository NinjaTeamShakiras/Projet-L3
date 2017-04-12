<?php
/* @var $this EntrepriseController */
/* @var $model Entreprise */



if ( $model->id_entreprise == $this->get_id_utilisateur_connexion(Yii::app()->user->getId()) )
{
	$this->menu=array(
		array('label'=>'Mettre à jour mon profil', 'url'=>array('update', 'id'=>$model->id_entreprise)),
	);
}
?>

<?php 	/*		On affiche un message en fonction si c'est le profil de l'utilisteur qui est connecté ou pas 	*/
		if ( $model->id_entreprise == $this->get_id_utilisateur_connexion(Yii::app()->user->getId()) ) : ?>
			<h1>Votre espace personnel :</h1>
<?php  	else : 		?>
			<h1>Profil entreprise <?php echo $model->nom_entreprise ?></h1>
<?php  	endif; 		?>


<?php 
$utilisateur = Utilisateur::model()->FindByAttributes(array('id_entreprise'=>$model->id_entreprise));
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
				array(
					'label'=>'Adresse mail',
					'value'=>$utilisateur->mail,
					),
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





<?php  	/*		Modification du message en fonction de qui voit le profil	*/
		if ( $model->id_entreprise == $this->get_id_utilisateur_connexion(Yii::app()->user->getId() ) ) : 	?>
			<h2>Les derniers avis de votre entreprise :</h2>
<?php  	else :  	?>
			<h2>Avis de cet employé :</h2>

<?php   endif; ?>



<?php 
	/*		Récupérations de tous les avis de l'entreprise 		*/
	$avis_all = AvisEntreprise::model()->findAll( "id_entreprise = " . $model->id_entreprise );
?>


<div>
<?php 
		/*		S'il y a des avis on les affiche 	 */
		if( sizeof( $avis_all ) > 0 ) :
			/*		On parcourt tous les avis de l'utilisateur pour les afficher 		*/
			foreach ( $avis_all as $key => $avis_obj ) :				?>

				<p>Note générale : <b><?php echo round( $avis_obj->note_generale_avis_entreprise, 1 ); ?></b></p>

<?php 			$criteresEntreprise_arr = EntrepriseAvisCritere::model()->findAll( "id_avis_entreprise = " . $avis_obj->id_avis_entreprise ); 		?>

				<ul class="ul-single-avis-<?php print( $avis_obj->id_avis_entreprise ); ?>">

<?php  			/*			On parcourt chaque critère de l'avis concerné 		*/
				foreach ( $criteresEntreprise_arr as $key => $critere_obj ) :			?>
<?php 				$critere_notation_obj = CriteresNotationEntreprise::model()->findByAttributes( array( "id_critere_entreprise"=>$critere_obj->id_critere_notation_entreprise ) );		?>

<?php  				if( !empty( $critere_obj->commentaire_evaluation_critere ) || !is_null( $critere_obj->note_entreprise_avis ) ) : ?>

						<li><?php print( $critere_notation_obj->nom_critere_entreprise ); ?> : <?php is_null( $critere_obj->note_entreprise_avis ) ? print( $critere_obj->commentaire_evaluation_critere ) : print( $critere_obj->note_entreprise_avis ); ?> </li>

<?php   			endif; 			?>
<?php  			endforeach; 		?>

<?php  			
				/*		Récupération de la personne qui a créé l'avis  		*/
				$auteur_avis_obj = Entreprise::get_entreprise_by_id_utilisateur( $avis_obj->id_utilisateur );  
?>				
				</ul>
				<p>Par : <?php $auteur_avis_obj != NULL ? print( $auteur_avis_obj->nom_entreprise ) :  print( "administrateur" );  ?></p>

<?php  			if ( $avis_obj->id_utilisateur == Utilisateur::get_utilisateur_connexion( Yii::app()->user->getId() )->id_utilisateur ) :	?>
					
					<p><button class="update-avis" id_avis="<?php print( $avis_obj->id_avis_entreprise ); ?>">Modifier mon avis</button></p>
					<div class="update-form-avis-<?php print( $avis_obj->id_avis_entreprise ); ?>" style="display: none;">
<?php  					$this->renderPartial('./../avisEntreprise/update', array 	( 
																				'model' => AvisEntreprise::model(),
																				'avisEntreprise_layout' => $avis_obj,
																				'criteresAvis_layout' => $criteresEntreprise_arr
																			) ); 		?>
					</div>

<?php  			endif; ?>

<?php  		endforeach; 	?>

<?php  	else : ?>
	<p>Il n'y a pas encore d'avis sur cette entreprise.</p>
<?php  	endif; ?>


</div>


<?php if( Utilisateur::est_employe( Yii::app()->user->role ) ) : ?>

<h2>Laissez votre avis à cette entreprise</h2>

<?php 
	$this->renderPartial('./../avisEntreprise/_form', array( 'model' => AvisEntreprise::model() ) ); 
	endif;
?>

