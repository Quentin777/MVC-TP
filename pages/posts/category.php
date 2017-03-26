<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=TP;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
 
 if(isset($_POST)&& !empty($_POST)){
   
      if(isset($_POST['lastName']) && $_POST['lastName']!='') {
          $donnee['lastName'] = $_POST['lastName'];
      }else{
          $message['danger'][] = 'Merci de mettre un nom';
      }
      if(isset($_POST['firstName']) && $_POST['firstName']!='') {
          $donnee['firstName'] = $_POST['firstName'];
      }else{
          $message['danger'][] = 'Merci de mettre un prénom';
      }
      if(isset($_POST['birthdate'])) {
          $donnee['birthDate'] = $_POST['birthdate'];
      }else{
          $message['danger'][] = 'Merci de mettre une date de naissance';
      }
      if(isset($_POST['adress']) && $_POST['adress']!='') {
          $donnee['adress'] = $_POST['adress'];
      }else{
          $message['danger'][] = 'Merci de mettre un adresse';
      }
      if(isset($_POST['zipCode']) && $_POST['zipCode']!='') {
          $donnee['zipCode'] = $_POST['zipCode'];
      }else{
          $message['danger'][] = 'Merci de mettre un code postal';
      }
      if(isset($_POST['phoneNumber']) && $_POST['phoneNumber']!='') {
          $donnee['phoneNumber'] = $_POST['phoneNumber'];
      }else{
          $message['danger'][] = 'Merci de mettre un numéro de téléphone';
      }

		$req = $bdd->prepare('INSERT INTO Users
                              SET     lastName= :lastName,
                                      firstName= :firstName,
                                      birthDate= :birthDate,
                                      adress= :adress,
                                      zipCode= :zipCode,
                                      phoneNumber= :phoneNumber,
                              ');
		
		$req->execute($donnee);
      
      	$message['success'][] = 'le client est bien ajouté';
}
?>
<div class="row">
	<div class="col-md-12">
<!--//////////////////// FORMULAIRE ////////////////////-->

		<form action="index.php?p=posts.category" method="post">
			<label for="lastName">Nom</label>
			<input type="text" name="lastName"> <br>
			<label for="firstName">prenom</label>
			<input type="text" name="firstName"><br>
			<label for="birthdate">Date de naissance</label>
			<input type="date" name="birthdate"><br>
			<label for="adress">Adresse</label>
			<input type="text" name="adress"><br>
			<label for="zipCode">Code Postal</label>
			<input type="number" name="zipCode"><br>
			<label for="phoneNumber">Télephone</label>
			<input type="number" name="phoneNumber"><br>
			<button type="submit">Envoie</button>
		</form>
	</div> 
</div>
<div class="row">
	<div class="col-md-12">
	</div> 
</div>
