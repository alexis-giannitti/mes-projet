<?php

//ouverture d'une conexion à la bdd utilisateur

$objetPdo=new PDO('mysql:host=localhost;dbname=form','root','');

//préparation de la requéte
$pdoStat=$objetPdo->prepare('UPDATE  utilisateur SET nom=:nom, prenom=:prenom, tel=:tel, mail=:mail WHERE id=:num LIMIT 1');


//liaison des paramètre nommé

$pdoStat->bindValue(':num', $_POST['numcontact'], PDO::PARAM_INT);


//liaison des paramètre nommé

$pdoStat->bindValue(':num', $_POST['numcontact'], PDO::PARAM_INT);
$pdoStat->bindValue(':nom', $_POST['firstname'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom', $_POST['lastname'], PDO::PARAM_STR);
$pdoStat->bindValue(':tel', $_POST['phone'], PDO::PARAM_STR);
$pdoStat->bindValue(':mail', $_POST['email'], PDO::PARAM_STR);

//éxecution de la requéte

$executeIsok=$pdoStat->execute();


	if ($executeIsok){
		$message='le contact a été mis a jour!';
	}else{

		$message='echec de la mise a jour';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>modification :resultat</title>
</head>
<body>

<h1>résultat de la modification</h1>

<p><?=$message ?></p>

</body>
</html>