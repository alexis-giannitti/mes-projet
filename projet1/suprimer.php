<?php

//ouverture d'une conexion à la bdd utilisateur

$objetPdo=new PDO('mysql:host=localhost;dbname=form','root','');

//préparation de la requéte
$pdoStat=$objetPdo->prepare('DELETE FROM utilisateur WHERE id=:num LIMIT 1');

//liaison des paramètre nommé

$pdoStat->bindValue(':num', $_GET['numcontact'], PDO::PARAM_INT);

//éxecution de la requéte

$executeIsok=$pdoStat->execute();

if ($executeIsok) {
		$message='le contact a été suprimer';
	}else{

		$message='echec de supression du contact';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>supression de contact</title>
</head>
<body>

<h1>supression du contact</h1>

<p><?=$message ?></p>


</body>
</html>
