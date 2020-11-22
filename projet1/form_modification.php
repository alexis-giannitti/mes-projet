<?php

//ouverture d'une conexion à la bdd utilisateur

$objetPdo=new PDO('mysql:host=localhost;dbname=form','root','');

//préparation de la requéte
$pdoStat=$objetPdo->prepare('SELECT * FROM utilisateur WHERE id=:num');


//liaison des paramètre nommé

$pdoStat->bindValue(':num', $_GET['numcontact'], PDO::PARAM_INT);


//éxecution de la requéte

$executeIsok=$pdoStat->execute();

//on récupére le contact

$contact=$pdoStat->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>modification</title>
</head>
<body>

<h1>modifier un contact</h1>

<form action="modifier.php" method="POST">

<input type="hidden" name="numcontact" value="<?=$contact['id']?>">
	
	<p>
		<label for="nom">Nom</label>
		<input type="text" id="prenom" name="firstname" value="<?=$contact['nom']?>">
	</p>

	<p>
		<label for="prenom">prenoms</label>
		<input type="text" id="prenom" name="lastname" value="<?=$contact['prenom']?>">
	</p>

	<p>
		<label for="tel">telephone</label>
		<input type="text" id="tel" name="phone" value="<?=$contact['tel']?>">
	</p>
	<p>
		<label for="mail">email</label>
		<input type="text" id="mail" name="email" value="<?=$contact['mail']?>">

	</p>

	<p><input type="submit" value="Enregistrer les modification"></p>

</form>



</body>
</html>