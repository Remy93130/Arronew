<?php

include 'connect_bdd.php';

$reponse = $bdd->query('SELECT * FROM tbl_data');

//Suppression des entrees qui date de plus de 7 jours
while ($donnees = $reponse->fetch()) 
{
	$date = new DateTime();
	$dateReleve = new DateTime($donnees['date']);
	$interval = new DateInterval('P7D');

	if($date->sub($interval) > $dateReleve)
	{
		$req = $bdd->prepare('DELETE FROM tbl_data WHERE id = :id');
		$req->execute(array('id' => $donnees['id']));
	}
}
$reponse->closeCursor();

//Insertion des nouvelles donnees
$req = $bdd->prepare('INSERT INTO tbl_data(date, temperature, niveauEau, sol1, sol2, sol3, sol4) VALUES(CURRENT_TIME(), :temperature, :niveauEau, :sol1, :sol2, :sol3, :sol4)');
$req->execute(array(
	'temperature' => $_GET['temperature'],
	'niveauEau' => $_GET['niveauEau'],
	'sol1' => $_GET['sol1'],
	'sol2' => $_GET['sol2'],
	'sol3' => $_GET['sol3'],
	'sol4' => $_GET['sol4']));

?>