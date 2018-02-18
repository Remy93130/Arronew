<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Tableau</title>
	<link rel="stylesheet" type="text/css" href="css/lecss.css" />
	<link rel="icon" type="image/png" href="files/herbe.jpg" />
	<script>

		var message = new Array();
		message[0] = "-ArroNew-"
		message[1] = "Observez les tableaux de l'ArroNew"
		message[2] = "servez les tableaux de l'ArroNew"
		message[3] = "vez les tableaux de l'ArroNew"
		message[4] = "les tableaux de l'ArroNew"
		message[5] = "tableaux de l'ArroNew"
		message[6] = "bleaux de l'ArroNew"
		message[7] = "eaux de l'ArroNew"
		message[8] = "de l'ArroNew"                                                                              
		message[9] = "l'ArroNew"
		message[10] = "ArroNew"
		var reps = 2;
		var speed = 55;  
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
	$revele = $bdd->query('SELECT * FROM tbl_data');
	?>

	<a href="menu.php"><img src="files/vrailogo.jpg" alt="logo"/></a>
    
    <nav class="arronav"> ArroNew</nav>
	<ul>
		<li><a href="menu.php">Menu</a></li>
  		<li><a href="pagecompte.php">Compte</a></li>
		<li><a class="active" href="pagetableau.php">Tableau</a></li>
		<li><a href="pageconception.php">Conception</a></li>
	</ul>
    
	<table>
		<tr>
			<th> Date </th>
			<th> Température </th>
			<th> Eau </th>
			<th>Humidité<br/>du sol 1</th>
			<th>Humidité<br/>du sol 2</th>
			<th>Humidité<br/>du sol 3</th>
			<th>Humidité<br/>du sol 4</th>
		</tr>
		<?php
		while ($donnees = $revele->fetch())
		{ 
			if ($donnees['niveauEau'] == 1)
			{
				$presenceEau = Oui;
			}
			if ($donnees['niveauEau'] == 0)
			{
				$presenceEau = Non;
			}
			?>
		<tr>
			<th> <?php echo $donnees['date'] ?></th>
			<th> <?php echo $donnees['temperature'] ?>°C</th>
			<th> <?php echo $presenceEau ?></th>
			<th> <?php echo $donnees['sol1'] ?>%</th>
			<th> <?php echo $donnees['sol2'] ?>%</th>
			<th> <?php echo $donnees['sol3'] ?>%</th>
			<th> <?php echo $donnees['sol4'] ?>%</th>
		</tr>
		<?php
		}
		$revele ->closeCursor();
		?>

	</table>
	
    <form method="POST" action="deconnexion.php">
		<input class="deco" type="submit" name="nom" value= "Se Déconnecter"/> 
	</form>
</body>
</html>