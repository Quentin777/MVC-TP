<?php
    $message = [];
    $donnee = [];
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=TP;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $Servicebdd=$bdd->query('SELECT * FROM Service')->fetchALL();
    $Usersbdd=$bdd->query('SELECT * FROM Users')->fetchALL();

    if(isset $_POST['Service']) && !empty($_POST['Service'])){
     $statement = $bdd->query ("SELECT * FROM Service , Users WHERE Service.id = $_POST['Service'] AND Users.service = Service.id");
     $idservice = $statement->fetchALL();
    }
 
 if(isset($_POST['robert'])){
 echo "submit OK";  
      if(isset($_POST['lastName']) && $_POST['lastName']!=''){ 
          $donnee['lastName'] = $_POST['lastName'];
             echo "coucou ";
      }
      else{
          $message['danger'][] = 'Merci de metthe un nom';
             echo "c'est de la merde";
      }
      if(isset($_POST['firstName']) && $_POST['firstName']!='') {
          $donnee['firstName'] = $_POST['firstName'];
                       echo "coucou1 ";
      }else{
          $message['danger'][] = 'Merci de metthe un prénom';
      }
      if(isset($_POST['birthdate'])) {
          $donnee['birthdate'] = $_POST['birthdate'];
                       echo "coucou2 ";
      }else{
          $message['danger'][] = 'Merci de metthe une date de naissance';
      }
      if(isset($_POST['adress']) && $_POST['adress']!='') {
          $donnee['adress'] = $_POST['adress'];
                       echo "coucou3 ";
      }else{
          $message['danger'][] = 'Merci de metthe un adresse';
      }
      if(isset($_POST['zipCode']) && $_POST['zipCode']!='') {
          $donnee['zipCode'] = $_POST['zipCode'];
                       echo "coucou4 ";
      }else{
          $message['danger'][] = 'Merci de metthe un code postal';
      }
      if(isset($_POST['phoneNumber']) && $_POST['phoneNumber']!='') {
          $donnee['phoneNumber'] = $_POST['phoneNumber'];
                       echo "coucou5 ";
      }else{
          $message['danger'][] = 'Merci de metthe un numéro de téléphone';
      }

      $req->execute($donnee);
      
        $message['success'][] = 'Utilisateur ajouté';
}
?>
<div class="row">
  <div class="col-md-12">
  
    <table>
    <tr>
    <th>id</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Adresse</th>
    <th>Code Postale</th>
    <th>Telephone</th>
    <th>Service</th>  
    </tr>

    <?php foreach ($idservice as $value) {
        echo "<tr>";
        echo "<td>".$value->lastName.'</td>';
        echo "<td>".$value->firstName.'</td>';
        echo "<td>".$value->birthdate.'</td>';
        echo "<td>".$value->adress.'</td>';
        echo "<td>".$value->zipCode.'</td>';
        echo "<td>".$value->phoneNumber.'</td>';
        echo "<td>".$value->service.'</td>';
        echo "</tr>";
    }
    ?>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <form action="" method="post">
      <select name="Service">
        <option value="">Choisie bâtard</option>
        <option value="1">Maintenance</option>
        <option value="2">Web Developper</option>
        <option value="3">Web Designer</option>
        <option value="4">Référenceur</option>
      </select>
      <input type="submit" name="robert">Envoie</button>
    </form>
  </div> 
</div>
