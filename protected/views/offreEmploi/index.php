<?php
/* @var $this OffreEmploiController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Offre Emplois',
//);
?>




<?php
	/* Menu */
	if (!Utilisateur::est_employe(Yii::app()->user->role) )
	{ // Si entreprise
		$this->menu=array(
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create'))
		);
	}
	else if( Utilisateur::est_employe(Yii::app()->user->role))  
	{  // Si employé
		$this->menu=array(
			array('label'=>'Postuler', 'url'=>array('postuler/index'))
		);
	}
	else 
	{ // Si autre
		$this->menu=array(
			array('label'=>'Créer une offre d\'emploi', 'url'=>array('create')),
			array('label'=>'Postuler', 'url'=>array('postuler/index')),
		);
	}

?>




<h1>Liste de mes offres d'emploi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	));
?>
