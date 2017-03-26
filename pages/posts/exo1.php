<?php
   $message = [];
   $donnee = [];
   $pdo= new PDO('mysql:host=localhost;dbname=TP;charset=utf8','root','');
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
   $statement=$pdo->query('SELECT id , lastName , firstName , birthdate , adress , zipCode, phoneNumber FROM Users');
   $typedecarte=$statement->fetchAll();



class formulaire{
	public function Formulaire(){


  	if(isset($_POST)&& !empty($_POST)){
   
      if(isset($_POST['nom']) && $_POST['nom']!='') {
          $donnee['lastName'] = $_POST['nom'];
      }else{
          $message['danger'][] = 'Merci de mettre un nom';
      }
      if(isset($_POST['prenom']) && $_POST['prenom']!='') {
          $donnee['firstName'] = $_POST['prenom'];
      }else{
          $message['danger'][] = 'Merci de mettre un prénom';
      }
      if(isset($_POST['date'])) {
          $donnee['birthdate'] = $_POST['date'];
      }else{
          $message['danger'][] = 'Merci de mettre une date de naissance';
      }
      if(isset($_POST['adress']) && $_POST['adress']!='') {
          $donnee['adress'] = $_POST['adress'];
      }else{
          $message['danger'][] = 'Merci de mettre une adresse';
      }if(isset($_POST['zipCode']) && $_POST['zipCode']!='') {
          $donnee['zipCode'] = $_POST['zipCode'];
      }else{
          $message['danger'][] = 'Merci de mettre un code postal';
      }if(isset($_POST['phoneNumber']) && $_POST['phoneNumber']!='') {
          $donnee['phoneNumber'] = $_POST['phoneNumber'];
      }else{
          $message['danger'][] = 'Merci de mettre un code postal';
      } 


      if(empty($message)){
      $req = $pdo->prepare("  INSERT INTO Users
                              SET     lastName= :lastName,
                                      firstName= :firstName,
                                      birthDate= :birthDate,
                                      adress= :adress,
                                      zipCode= :zipCode,
                                      phoneNumber = :phoneNumber,
                          ");
      $req->execute($donnee);
      $message['success'][] = 'le client est bien ajouté';
  	  }
    }
  }
}
?>

<div class="row">
	<div class="col-md-12">
		<form action="index.php?p=posts.exo1" method="post">
	 		<select name="service">
			<option value="1">Maintenance</option>
			<option value="2">Web Developper</option>
			<option value="3">Web Designer</option>
			<option value="4">Référenceur</option>
		</select>
			<button type="submit">Envoie</button>
		</form>
	</div>

	<?php
        foreach ($typedecarte as $value) {
                   echo '<option value="'.$value->id.'">'.$value->firstName.'<br/></option>';
               }
    ?>

</div>
