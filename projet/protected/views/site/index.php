<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$id = 1;
$employe = Employe::model()->findByAttributes(array("id_employe" => $id));
$entreprise = Entreprise::model()->findAll();


echo "<h1 align='center'>Bienvenue sur la page d'accueil de PROZZL</h1>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

foreach ($entreprise as $tmpEntreprise) {
	echo $tmpEntreprise->nom_entreprise;
	echo "<br/>";
}

echo "<br/>";
echo "<br/>";
echo "<br/>";

echo $employe->Adresse->rue;
echo "<br/>";
echo $employe->Adresse->ville;
echo "<br/>";
echo $employe->Adresse->code_postal;
echo "<br/>";

?>
