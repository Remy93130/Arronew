<?php

session_start();
include '../connect_bdd.php';

$req = $bdd ->prepare('UPDATE tbl_user SET pwd = :nv_pwd WHERE mail = :mail');
$req->execute(array(
	'nv_pwd' => $_POST['nv_pwd'], 
	'mail' => $_SESSION['mail']));

?>
<script> alert("Votre mot de passe a ete change !");</script>
<?php

header('Location: ../deconnexion.php');

?>


