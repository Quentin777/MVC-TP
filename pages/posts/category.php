<?php
try
{
  	$message = [];
   	$donnee = [];
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=TP;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $statement=$bdd->query('SELECT * FROM Users');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
 
 if(isset($_POST['robert'])){
 echo "submit OK";  
      if(isset($_POST['lastName']) && $_POST['lastName']!=''){ 
          $donnee['lastName'] = $_POST['lastName'];
             echo "coucou ";
      }
      else{
          $message['danger'][] = 'Merci de mettre un nom';
             echo "c'est de la merde";
      }
      if(isset($_POST['firstName']) && $_POST['firstName']!='') {
          $donnee['firstName'] = $_POST['firstName'];
                       echo "coucou1 ";
      }else{
          $message['danger'][] = 'Merci de mettre un prénom';
      }
      if(isset($_POST['birthdate'])) {
          $donnee['birthdate'] = $_POST['birthdate'];
                       echo "coucou2 ";
      }else{
          $message['danger'][] = 'Merci de mettre une date de naissance';
      }
      if(isset($_POST['adress']) && $_POST['adress']!='') {
          $donnee['adress'] = $_POST['adress'];
                       echo "coucou3 ";
      }else{
          $message['danger'][] = 'Merci de mettre un adresse';
      }
      if(isset($_POST['zipCode']) && $_POST['zipCode']!='') {
          $donnee['zipCode'] = $_POST['zipCode'];
                       echo "coucou4 ";
      }else{
          $message['danger'][] = 'Merci de mettre un code postal';
      }
      if(isset($_POST['phoneNumber']) && $_POST['phoneNumber']!='') {
          $donnee['phoneNumber'] = $_POST['phoneNumber'];
                       echo "coucou5 ";
      }else{
          $message['danger'][] = 'Merci de mettre un numéro de téléphone';
      }

		$req = $bdd->prepare('INSERT INTO Users
                              SET     lastName= :lastName,
                                      firstName= :firstName,
                                      birthdate= :birthdate,
                                      adress= :adress,
                                      zipCode= :zipCode,
                                      phoneNumber= :phoneNumber
                              ');
		$req->execute($donnee);
      
      	$message['success'][] = 'Utilisateur ajouté';
}
?>
<div class="row">
	<div class="col-md-12">
<!--//////////////////// FORMULAIRE ////////////////////-->

		<form action="" method="post">
			<label for="lastName">Nom</label>
			<input type="text" name="lastName" maxlength="50"><br>
			<label for="firstName">prenom</label>
			<input type="text" name="firstName" maxlength="50"><br>
			<label for="birthdate">Date de naissance</label>
			<input type="date" name="birthdate"><br>
			<label for="adress">Adresse</label>
			<input type="text" name="adress" maxlength="50"><br>
			<label for="zipCode">Code Postal</label>
			<input type="number" name="zipCode" maxlength="5"><br>
			<label for="phoneNumber">Télephone</label>
			<input type="number" name="phoneNumber" maxlength="10"><br>
			<input type="submit" name="robert">Envoie</input>
		</form>
	</div> 
</div>
<div class="row">
	<div class="col-md-12">
	</div> 
</div>
