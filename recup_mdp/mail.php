<?php

include '../connect_bdd.php';

extract($_POST);

$req = $bdd->prepare('SELECT mail FROM tbl_user WHERE mail = :mail');
$req->execute(array('mail' => $email));

$resultat = $req->fetch();

if (!$resultat)
{
	include'recupmdp.php';
	?>
	<script> alert("Cette adresse mail ne correspond a aucun compte !");</script>
    <?php
}
else
{
	session_start();
	// Creation de la cle

	$cle = mt_rand(100000, 999999);

	// Creation du mail

	// $mail = '$_POST[\'email\']'; // Declaration de l adresse de destination.
	// $mail = 'remy.barberet@outlook.fr';

	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['email'])) // On filtre les serveurs qui rencontrent des problemes avec les sauts de lignes.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	// Declaration du messages au format au format HTML.
	$message_html = "	<html>
						<head></head>
						<body>
						<p>Bonjours, vous avez demandez un nouveau mot de passe. Pour ce faire inscrivez le code si dessous :</p><p>Votre code secret : <b>$cle</b></p>
						<p>Si vous n'avez pas demande de nouveau mot de passe, merci d'ignorer ce message</p><br/>
						<p>L'Equipe Arronew</p>
						</body>
						</html>";
	 
	// Creation de la boundary
	$boundary = "-----=".md5(rand());
	 
	// Definition du sujet.
	$sujet = "Recuperation de votre mot de passe";
	 
	// Creation du header de l'e-mail.
	$header = "From: \"Arronew\"<Arronew>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	 
	// Creation du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	// Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;

	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	 
	// Envoi du mail.
	mail($_POST['email'],$sujet,$message,$header);

	/*---------------------------------------------------------------------------------------------------------------------
	---------------------------------------------------------------------------------------------------------------------*/

	// Inscription du code dans la base de donnee

	$req = $bdd->prepare('UPDATE tbl_user SET cle = :cle WHERE mail = :mail');
	$req-> execute(array(
		'cle' => $cle,
		'mail' => $_POST['email']));
	$_SESSION['mail'] = $_POST['email'];

	header('Location: code.php');
}

?>