<?php 

// Connexion a la base de donnees
include 'connect_bdd.php';

extract($_POST);

// Verifie les donnees recue
$req = $bdd->prepare('SELECT id FROM tbl_user WHERE login = :login AND pwd = :pwd');
$req->execute(array(
    'login' => $login,
    'pwd' => $pwd));

$compte = $req->fetch();

if (!$compte)
{
    if ($pwd != NULL)
    {
        ?>
        <script> alert("Mauvais identifiant ou mot de passe.");</script>
        <?php
    }
    include 'index.php';
}

else
{
    /* Si les informations recues sont correct alors on prepare la session
       De l utilisateur avec ses informations personnelles */
    session_start();
    $_SESSION['id'] = $compte['id'];
    
    $req = $bdd->prepare('SELECT nom, mail FROM tbl_user WHERE id = :id');
    $req->execute(array('id' => $_SESSION['id']));
    $resultat = $req->fetch();
    
    $_SESSION['login'] = $login;
    $_SESSION['nom'] = $resultat['nom'];
    $_SESSION['mail'] = $resultat['mail'];
    
    header('Location: menu.php');
}   
?>