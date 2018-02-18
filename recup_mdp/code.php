<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Mot de passe oublié</title>
	<link rel="stylesheet" type="text/css" href="../css/projet1.css":/>
	<link rel="icon" type="image/png" href="../files/herbe.jpg" />
	
	<script language="JavaScript">
			var message = new Array();
			message[0] = "Merci d'entrez le code recu"
			message[1] = "ci d'entrez le code recu"
			message[2] = "d'entrez le code recu"
			message[3] = "trez le code recu"
			message[4] = "le code recu"
			message[5] = "code recu"
			message[6] = "recu"
			message[7] = "-ArroNew-";
			var reps = 2;
			var speed = 65;  
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
	<img src="../files/vrailogo.jpg"/>
    <div>
	<p>Merci de rentrez le code reçu sur votre E-Mail</p>
	<form method="post" action="verif_code.php">
		<input type="text" name="cle" id="cle" />
		<input type="submit" value="VALIDER" />
	</form>
	</div>
</body>
</html>