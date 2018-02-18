<?php
session_start();

if ($_SESSION['id'] == NULL)
{
    header('Location: index.php');
}

// Connexion a la base de donnees
include 'connect_bdd.php';

extract($_POST);

$req = $bdd ->prepare('UPDATE tbl_user SET login = :nv_login, pwd = :nv_pwd, nom = :nv_nom, mail = :nv_mail WHERE id = :id');
$req->execute(array(
	'nv_login' => $nv_login,
	'nv_pwd' => $nv_pwd,
	'nv_nom' => $nv_nom,
	'nv_mail' => $nv_mail,
	'id' => $_SESSION['id']));

header('Location: deconnexion.php');

?>