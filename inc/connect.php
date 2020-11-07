<?php 

$sqlHost 		= '127.0.0.1'; // Je stock dans une variable l'adresse du localhost
/*$sqlHost 		= 'localhost';*/
$sqlUser 		= 'root'; // Je stock dans une variable le nomm de l'utilisateur
$sqlPassword 	= ''; // Je stock le password (vide sous windows en générale)
$dbName			= 'web_radio'; // Je stock le nom de la base de donnée que l'on cible

try { // Exeption pour essayer ...
	$bdd = new PDO('mysql:host='.$sqlHost.';dbname='.$dbName.';charset=utf8',$sqlUser,$sqlPassword) or die($bdd->errorInfo()); // On créer une classe PDO pour se connecter à la base de donnée OU On tue le process pour afficher une erreur
} catch(Exception $e) { // Exeption pour afficher une erreur
	die('Erreur: ' .$e->getMessage()); // On afficher un message d'erreur
}

 ?>