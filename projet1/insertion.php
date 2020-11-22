<?php

//ouverture d'une conexion à la bdd utilisateur

$objetPdo=new PDO('mysql:host=localhost;dbname=form','root','');

	//préparation de la requéte d'insertion (SQL)

	$pdoStat=$objetPdo->prepare('INSERT INTO utilisateur VALUES(NULL, :nom,:prenom,:tel,:mail)');


	// on lie chaque marqueur à une valeur

	$pdoStat->bindvalue(':nom', $_POST['lastname'], PDO::PARAM_STR);
	$pdoStat->bindvalue(':prenom', $_POST['firstname'], PDO::PARAM_STR);
	$pdoStat->bindvalue(':tel', $_POST['phone'], PDO::PARAM_STR);
	$pdoStat->bindvalue(':mail', $_POST['email'], PDO::PARAM_STR);

//exécution de la requéte préparer

	$isertIsok=$pdoStat->execute();

	if ($isertIsok) {
		$message=' votre inscription a bien étés validés';
	}else{

		$message='echec de linsertion';
	}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>document</title>
</head>
<body>
<a href="index1.php">aceuil</a>
<h1>Insertion des contact</h1>

<p><?php echo $message; ?></p>

</body>
</html>