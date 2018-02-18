<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Votre Compte</title>
	<link rel="stylesheet" type="text/css" href="css/lecss.css":/>
	<link rel="icon" type="image/png" href="files/vrailogo.jpg" />

	<script language="JavaScript">
		var message = new Array();
		message[0] = "-ArroNew-"
		message[1] = "-ArroNew-ArroNew-"
		message[2] = "-COMPTE-"
		message[3] = "-ArroNew-";
		var reps = 2;
		var speed = 45;  
		var p = message.length;
		var T = "";
		var C = 0;
		var mC = 0;
		var s = 0;
		var sT = null;
		if (reps < 1) reps = 1;
		function doTheThing() 
		{
			T = message[mC];
			A();
		}
		function A() 
		{
			s++;
			if (s > 8) 
			{ 
				s = 1;
			}

		if (s == 1) 
		{ 
			document.title = ''+T+''; 
		}
		if (s == 2) 
		{ 
			document.title = ''+T+''; 
		}
		if (C < (8 * reps)) 
		{
		sT = setTimeout("A()", speed);
		C++;
		}
		else 
		{
		C = 0;
		s = 0;
		mC++;
		if(mC > p - 1) mC = 0;
		sT = null;
		doTheThing();	
		   }

		}
		doTheThing();
	</script>
</head>
<body>

<?php 
session_start(); 
if ($_SESSION['id'] == NULL)
{
    header('Location: index.php');
}
?>

   <a href="menu.php"><img src="files/vrailogo.jpg"/></a>
     
    <nav class="arronav"> ArroNew</nav>
	<ul>
		<li><a href="menu.php">Menu</a></li>
  		<li><a class="active" href="pagecompte.php">Compte</a></li>
		<li><a href="pagetableau.php">Tableau</a></li>
		<li><a href="pageconception.php">Conception</a></li>
	</ul>
	
    <div class="compte">
		<form method="post" action="modif_compte.php">
		<h2> Information sur votre compte :</h2>
		<p> Nom : <br/><input class="util" type="text" name="nv_nom" id="nv_nom" value="<?php echo $_SESSION['nom']; ?>" /></p>
		<p> Identifiant : <br/><input class="util" type="text" name="nv_login" id="nv_login" value="<?php echo $_SESSION['login']; ?>" /></p>
		<p> Addresse e-mail : <br/><input class="util" type="mail" name="nv_mail" id="nv_mail" value="<?php echo $_SESSION['mail']; ?>" /> </p>
		<p> Mot de Passe : <br/><input class="util" type="password" name="nv_pwd" id="nv_pwd" /> </p> 
		<input class="modifiercompte" type="submit" name="nom" value= "Modfier"/> 
		</form>
    </div>
    
    <form method="POST" action="deconnexion.php">
		<input class="deco" type="submit" name="nom" value= "Se Déconnecter"/> 
	</form>
</body>
 </html>