<?php
$con=new PDO('mysql:host=localhost; dbname=pira shoping','root','');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>pakavile.com</title>
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/navv.css">
        <meta name="viewport" content="width=device-width, initial=scal=1.0"/>
        <script src="css/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap_java.js"></script>
    </head>
    <body onload="cacher()">
        <header id="tete">
            <img src="images/ben.png" alt="Ben the wise" width="120" />
            <p ><font color="blue" size="5"><center>Gestion des Entrees/Sorties</center></font></p>
        </header>
<!-----------------------------------------------------------------------------------------------------------
    Menu d'entete-------------->
        <nav>
            <div class="menu">
                <ul>
                    <li><a href="javascript:afficher('fact')">Facturier</a></li>
                    <li><a href="javascript:afficher('maga')">Magasinier</a></li>
                    <li><a href="javascript:afficher('adm')">Administrateur</a></li>
                    <li><a href="javascript:afficher('apropos')">A propos</a></li>
            </div>
        </nav>
        <!----------------------------------------------------------------------------------------------------+
            div de cloque d'appel des chaque groupe des informations---------->
<div class="red">
    <div id="droit">
        <!---Bloque Facturier-->
        <div id="fact">
            <h2><font color="black" size="30">Facturier</font></h2>
            <a href="javascript:afficher1('etafac')">Etablir une facture</a>
            <a href="javascript:afficher1('consultStock')">Consulter les Articles</a>
        </div>
        <!----Bloque magasinier--->
        <div id="maga">
            <h2><font color="black" size="20">Magasinier</font></h2>
            <a href="javascript:afficher1('creercat')">Creer une categorie</a>
            <a href="javascript:afficher1('ajouterart')">Ajouter Articles</a>
            <a href="javascript:afficher1('consult')">Consulter les Articles</a>
        </div>
        <!----Bloque administrateur--->
        <div id="adm">
            <h1><font color="black" >Administrateur</font></h1>
            <a href="javascript:afficher1('gestionuti')">Gerer les utilisateur</a>
            <a href="javascript:afficher1('StockAdm')">Consulter les Articles</a>
        </div>
        <!----Bloque a propos de -->
        <div id="apropos">
            <h2><font color="black" size="30">A Propos de </font></h2>
            <a href="javascript:afficher1('ben')">Concepteur</a>
            <a href="#">Autres</a>
        </div>
    </div>
    
    <!--------------------------------------------------------------------------------+
        Creation des categories-->
<form method="POST" action="index.php">
    <div id="centre">
        <div id="creercat">
            <h1>Creer une categorie</h1><br>
                <center>
                    <table>
                        <tr>
                            <td>No Categorie</td>
                            <td><input type="text" name="NumCat"></td>
                        </tr>
                        <tr>
                            <td>Nom Categorie</td>
                            <td><input type="text" name="NomCat"></td>
                        </tr>
                    </table>
                    <input type="submit" value="Creer">
                </center>
            </div>
            <?php
    if(isset($_POST['NumCat']) && isset($_POST['NomCat'])){
            $a=$_POST['NumCat'];
            $b=$_POST['NomCat'];
            if(!$con)
                echo"Connexion impossible";
            else{
                $req="INSERT INTO categorie
                                   VALUE('$a','$b')";
                $exe=$con->query($req);
                                    echo"La categorie $b a été ajouté";
                    }
            }
?>
</form>
        <!--- concepteur-->
             <div id="ben"> 
                <div id="un">
                    <span><p>Je m'appel Benjamin Mutanga, etudiant de premiere licence a l'institut superieur de statistique. present aujourdhui pour vous faire plaisir avec les peut des choses aprises a l'institut, avec nos encadreurs superieur comme monsieur bula butupu lucide le master qui nous reste en vie</p></span>
                <span><p>concepteur de systeme d'information</p></span>
                </div>
               <div id="de">
                    <img src="images/OK.png" width="150">
               </div>
           </div>
     <!----------------------------------------------------------------------------+
            Consultation des articles-->
            <form method="POST" action="index.php">
            <div id="consult">
                <h1>Consultation des Articles</h1><br>
                <center>
                <?php
            if(!$con)
                echo"Connexion impossible";
               $req="SELECT * FROM article";
               $exe=$con->query($req);
                                    {echo"<h2>Liste des Articles</h2>";
                                      echo'<table width="300">';
                                        echo'<tr>';
                                         echo'<td>Code Art</td>';
                                         echo'<td>Libelle</td>';
                                         echo'<td>Prix</td>';
                                         echo'<td>Categorie</td>';
                                        echo'</tr>';
                                     while($l=$exe->fetch())       
                                       {echo'<tr>';
                                         echo'<td>'.$l['codeart'].'</td>';
                                         echo'<td>'.$l['libelle'].'</td>';
                                         echo'<td>'.$l['prix'].'</td>';
                                         echo'<td>'.$l['numcat'].'</td>';
                                        echo'</tr>';
                                        
                                           }
                                        echo'</table>';
                                        
                            }
            ?>
            </center>
            </div>
        </form>
<!-------------------------------------------------------------------------------
    consultation de stock--->
            <form method="POST" action="index.php">
            <div id="consultStock">
                <h1>Consultation des Articles</h1><br>
                <center>
                <?php
            if(!$con)
                echo"Connexion impossible";
               $req="SELECT * FROM article";
               $exe=$con->query($req);
                                    {echo"<h2>Liste des Articles</h2>";
                                      echo'<table width="300">';
                                        echo'<tr>';
                                         echo'<td>Code Art</td>';
                                         echo'<td>Libelle</td>';
                                         echo'<td>Prix</td>';
                                         echo'<td>Categorie</td>';
                                        echo'</tr>';
                                     while($l=$exe->fetch())       
                                       {echo'<tr>';
                                         echo'<td>'.$l['codeart'].'</td>';
                                         echo'<td>'.$l['libelle'].'</td>';
                                         echo'<td>'.$l['prix'].'</td>';
                                         echo'<td>'.$l['numcat'].'</td>';
                                        echo'</tr>';
                                        
                                           }
                                        echo'</table>';
                                        
                            }
            ?>
            </center>
            </div>
        </form>
    <!----------gestion utilisateur-------->
    <form method="POST" action="index.php">
            <div id="gestionuti">
                <h2>Gestion des utilisateurs</h2><br>
                    <center>
                        <table>
                            <tr>
                                <td>Matricule</td>
                                <td><input type="text" name="matid"></td>
                            </tr>
                            <tr>
                                <td>Nom</td>
                                <td><input type="text" name="nomid"></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><select name="comb">
                                    <option>Facturier</option>
                                    <option>Magasinier</option>
                                    <option>Administrateur</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Mot passe</td>
                                <td><input type="password" name="mod"></td>
                            </tr>
                        </table>
                    <input type="submit" value="Ajouter un utilisateur">
                </center>
            </div>
            <?php
    if(isset($_POST['matid']) && isset($_POST['nomid']) && isset($_POST['comb'])){
            $a=$_POST['matid'];
            $b=$_POST['nomid'];
            $c=$_POST['comb'];
            $d=$_POST['mod'];
            if(!$con)
                echo"Connexion impossible";
            else{
                $req="INSERT INTO utilisateur
                                   VALUE('$a','$b','$c','$d')";
                $exe=$con->query($req);
                                    echo"L'utilisateur $b a été ajouté";
                    }
            }
?>
        </form>
    <!---------consultation stock administrateur---->
        <form method="POST" action="index.php">
            <div id="StockAdm">
                <h1>Consultation des Articles</h1><br>
                <center>
                <?php
            if(!$con)
                echo"Connexion impossible";
               $req="SELECT * FROM article";
               $exe=$con->query($req);
                                    {echo"<h2>Liste des Articles</h2>";
                                      echo'<table width="300">';
                                        echo'<tr>';
                                         echo'<td>Code Art</td>';
                                         echo'<td>Libelle</td>';
                                         echo'<td>Prix</td>';
                                         echo'<td>Categorie</td>';
                                        echo'</tr>';
                                     while($l=$exe->fetch())       
                                       {echo'<tr>';
                                         echo'<td>'.$l['codeart'].'</td>';
                                         echo'<td>'.$l['libelle'].'</td>';
                                         echo'<td>'.$l['prix'].'</td>';
                                         echo'<td>'.$l['numcat'].'</td>';
                                        echo'</tr>';
                                        
                                           }
                                        echo'</table>';
                                        
                            }
            ?>
            </center>
            </div>
        </form>
        <!----------------------------------------------------------------------------
         Ajout des articles dans la categorie-->
         <form method="POST" action="index.php">
            <div id="ajouterart">
                <h2>Ajouter Article</h2><br>
                    <center>
                        <table>
                            <tr>
                                <td>Code Article</td>
                                <td><input type="text" name="CodeArt"></td>
                            </tr>
                            <tr>
                                <td>Libelle</td>
                                <td><input type="text" name="Libelle"></td>
                            </tr>
                            <tr>
                                <td>Prix</td>
                                <td><input type="text" name="Prix"></td>
                            </tr>
                            <tr>
                                <td>No Categorie</td>
                                <td><select name="NumCat">
                                    <option >Num categorie</option>
                <?php
                    $req="SELECT * FROM categorie";
                    $exe=$con->query($req);
                    while($l=$exe->fetch()) 
                       echo'<option>'.$l['codecat'].'</option>';
               ?>
                                </select></td>
                            </tr>
                        </table>
                    <input type="submit" value="Ajouter">
                </center>
            </div>
            <?php
    if(isset($_POST['CodeArt']) && isset($_POST['Libelle']) && isset($_POST['Prix'])){
            $a=$_POST['CodeArt'];
            $b=$_POST['Libelle'];
            $c=$_POST['Prix'];
            $d=$_POST['NumCat'];
            if(!$con)
                echo"Connexion impossible";
            else{
                $req="INSERT INTO article
                                   VALUE('$a','$b','$c','$d')";
                $exe=$con->query($req);
                                    echo"L'article $b a été ajouté";
                    }
            }
?>
        </form>
        <!-------------Etablissement de la facture---->
        <form>
            <div id="etafac">
                <h2>Etablissement de la facture</h2><br>
                    <center>
                        <table>
                            <tr>
                                <td>Nom Client</td>
                                <td><input type="text" name="Libelle"></td>
                            </tr>
                             <tr>
                                <td>Code Article</td>
                                <td><select name="NumCatImp">
                                    <option disabled="disabled">Code  de  l'article</option>
                <?php
                    $req="SELECT * FROM article";
                    $exe=$con->query($req);
                    while($l=$exe->fetch()) 
                       echo'<option>'.$l['codeart'].'</option>';
               ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Libelle Article</td>
                                <td><input type="text" name="Prix"></td>
                            </tr>
                            <tr>
                                <td>Prix Unitaire</td>
                                <td><input type="text" name="NumCat"></td>
                            </tr>
                            <tr>
                                <td>Quantite</td>
                                <td><input type="text" name="NumCat"></td>
                            </tr>
                            <tr>
                                <td>Prix total</td>
                                <td><input type="text" name="NumCat"></td>
                            </tr>
                        </table>
                    <input type="submit" value="Imprimer Facture">
                </center>
            </div>
        </form>
    </div>
</div>
<!------------------------------------------------------------------------------------+
             debut de pied de page--->
		<main></main>
<footer>
      <div class="footer-body">
         <h2 id="sisi"> Concepteur</h2>
         <div>
            <p> Ben the wise </p>
            <p>Concepteur de Systeme d'Information</p>
         </div>
      </div>
      <div class="ok">
          <h2 id="sisi">Administracteur de:</h2>
          <a href="#">Pakavile.com</a>
          <a href="#">Page facebook: Ben le sage</a>
          <a href="#"> Instagram: benTheWise</a>
      </div>
      <div id="si">
          <h2 id="sisi">Mes Collaborateurs</h2>
          <ul type="square">
              <li>Isaac KABAMBA</li>
              <li>Elie MBUYI</li>
              <li>Jordach LUKUSA</li>
              <li>Charles MAPETO</li>
          </ul>
      </div>
      <div class="footer-copyright">
        <marquee>
        <span class="brand">Ben the wise</span> 
        &copy; 
        <span id="copyright-year">
            Copyright 2020.
        </span> | 
        <a href="#">Tout droit reserve</a>
    </marquee>
      </div>
   </footer>
   <!-----Fin de pied de page-->

    </body>
</html>
