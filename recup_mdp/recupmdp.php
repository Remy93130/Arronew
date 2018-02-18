<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Mot de passe oublié</title>
	<link rel="stylesheet" type="text/css" href="../css/projet1.css":/>
	<link rel="icon" type="image/png" href="../files/herbe.jpg" />

	<script LANGUAGE="JavaScript">
		var message = new Array();
		message[0] = "VOUS"
		message[1] = "AVEZ"
		message[2] = "OUBLIE"
		message[3] = "VOTRE"
		message[4] = "MOT"
		message[5] = "DE"
		message[6] = "PASSE"
		message[7] = "-ArroNew-";
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
	<img src="../files/vrailogo.jpg"/>
    <div>
	<p>Entrez votre adresse E-Mail</p>
	<Form method="post" action="mail.php">
		<input type="mail" name="email" id="email" />
		<input class="valider" type="submit" value="VALIDER" />
	</Form>
	</div>
</body>
</html>