<?php

session_start();
include '../connect_bdd.php';

$req = $bdd->prepare('SELECT cle FROM tbl_user WHERE cle = :cle');
$req->execute(array('cle' => $_POST['cle']));

$resultat = $req->fetch();

if (!$resultat)
{
	?>
	<script> alert("Il y a une erreur dans la cle entree.");</script>
    <?php
    header('Location: code.php');
}
else
{
	$req = $bdd->prepare('UPDATE tbl_user SET cle = NULL WHERE cle = :cle');
	$req->execute(array('cle' => $_POST['cle']));
	header('Location: nvpasse.php');
}

?>