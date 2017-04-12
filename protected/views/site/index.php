<?php
/* @var $this SiteController */


$this->pageTitle=Yii::app()->name;


echo "<h1 align='center'>Bienvenue sur la page d'accueil de PROZZL</h1>";
echo "<br/>";

$this->renderPartial('./../entreprise/_search_accueil', array('model'=>Entreprise::model()));


?>
