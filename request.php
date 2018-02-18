<?php
echo "bla";
include 'connect_bdd.php';
//verifier si req preparer compatilble avec insert
//echapper les caractere speciaux pour eviter une faille
$req = $bdd->prepare('SELECT id FROM test WHERE login = :login AND pwd = :pwd');
$req->execute(array(
    'login' => $_GET['login'],
    'pwd' => $_GET['pwd']));
    
$compte = $req->fetch();

}

?>