<?php

//ouverture d'une conexion à la bdd utilisateur

$objetPdo=new PDO('mysql:host=localhost;dbname=form','root','');

$pdoStat=$objetPdo->prepare('SELECT * FROM utilisateur ORDER BY id ASC');


//exécution de la requéte 

	$executeIsOK=$pdoStat->execute();



//récupération des resultats en une seul fois

$contacts=$pdoStat->fetchall();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>lister</title>
</head>
<body>

<h1>liste des contacts</h1>

<ul>
	
<?php foreach($contacts as $contact):?>
	<li>
		<?=$contact['id']?><?=$contact['nom']?><?=$contact['prenom']?><?=$contact['tel']?><?=$contact['mail']?> 
		
		<a href="suprimer.php?numcontact=<?=$contact['id']?>">suprimer</a>
	
		<a href="form_modification.php?numcontact=<?=$contact['id']?>">modifier</a>

	</li>

<?php endforeach;?>	


</ul>

</body>
</html>