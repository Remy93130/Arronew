<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>ArroNew</title>
	<link rel="stylesheet" type="text/css" href="css/point.css" />
</head> 
<body>
	<nav>
	<h1><strong>ArroNew</strong></h1>
		<br/>
	
	<form method="post" action="connexion.php">
	
	<p><strong>Nom d'utilisateur :</strong></p>
	<input type="text" name="login" id="login" />
		<br/>
		<br/>
		<br/>
	
	<p><strong>Mot de passe :</strong></p>
	<input type="password" name="pwd" id="pwd" />
		<br/>
		<br/>
	<a href="recup_mdp/recupmdp.php">Mot de passe oublié</a>
		<br/>
		<br/>
	<input class="valider" type="submit" value="VALIDER" />
	</form>
	</nav>
</body> 	
</html>