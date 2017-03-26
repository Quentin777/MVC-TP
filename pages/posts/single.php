<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=TP;charset=utf8', 'root', '');
    if (isset($POST['supprimer']) && $_POST['supprimer']!=''){
        $statement = $pdo->query("DELETE FROM Users WHERE id=".$_POST['supprimer']);
    }
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Users');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
     id: <?php echo $donnees['id'];?><br />
     Nom: <?php echo $donnees['lastName']; ?><br />
     Prenom: <?php echo $donnees['firstName']; ?><br />
     Date de naissance <?php echo $donnees['birthdate']; ?><br />
     adress: <?php echo $donnees['adress']; ?> euros !<br />
     code postal : <?php echo $donnees['zipCode']; ?><br />
     téléphone : <?php echo $donnees['phoneNumber']; ?><br />
     service <?php echo $donnees['service']; ?><br />
   </p>

<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>