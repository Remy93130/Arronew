<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css/lecss.css":/>
	<link rel="icon" type="image/png" href="files/vrailogo.jpg" />

	<script language="JavaScript">
		var message = new Array();
		message[0] = "-ArroNew-"
		message[1] = "-ArroNew-ArroNew-"
		message[2] = "-MENU-"
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

include 'connect_bdd.php';
$reponse = $bdd->query('SELECT niveauEau FROM tbl_data ORDER BY id DESC LIMIT 0,1');
$donnees = $reponse->fetch();

if ($donnees['niveauEau'] == 0)
{ ?>
	<script>alert("Attention ! Il ne reste plus d\'eau dans le reservoir impossible d\'arroser les plants.");</script>
<?php
} ?>

	<a href="menu.php"><img src="files/vrailogo.jpg"/></a>
	
	<nav class="arronav"> ArroNew</nav>
	<ul>
		<li><a class="active" href="menu.php">Menu</a></li>
  		<li><a href="pagecompte.php">Compte</a></li>
		<li><a href="pagetableau.php">Tableau</a></li>
		<li><a href="pageconception.php">Conception</a></li>
	</ul>
	<div class="compte">
		<h2>INFORMATION SUR L'ARRONEW</h2>
		<p>Bonjour <strong><?php echo $_SESSION['nom'] ?></strong>. Quel joie de vous revoir !</p> 
		<p>Vous pouvez voir les <strong>informations</strong> de votre <strong>compte</strong> en cliquant <a class="ici" href="pagecompte.php">ici.</a></p>
		<p>Vous pouvez également regarder les <strong>différents</strong> Tableau que propose l'ArroNew en cliquant <a class="ici" href="pagetableau.php">ici</a>.</p>
		<p>Vous pouvez donner des <strong>ordres</strong> a l'<strong>ArroNew</strong> via la conception en cliquant <a class="ici" href="pageconception.php">ici</a>.</p>
	</div>
	<form method="POST" action="deconnexion.php">
		<input class="deco" type="submit" name="nom" value= "Se Déconnecter"/> 
	</form>
</body>
</html>