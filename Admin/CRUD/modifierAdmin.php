<?php 
session_start();

if (isset($_SESSION['user_id']) ) {
  header("Location: index.php");
}

require("../../database/db.php");
?>

<?php 

$id = $_GET['id'];


$sql = "SELECT * 
        FROM useradmin 
        WHERE id=:id";

$preparation = $db->prepare($sql);

$preparation->execute([':id' => $id]);
$admin = $preparation->fetch(PDO::FETCH_OBJ);

?>

<link rel="stylesheet" href="css/w3.css">

<?php

require("header.php");
$message = ""; 


if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) && $_POST['psw'] === $_POST['psw-repeat']) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse1 = password_hash($_POST['psw'], PASSWORD_BCRYPT);
    $motdepasse2 = password_hash($_POST['psw-repeat'], PASSWORD_BCRYPT);

    $sql = 'UPDATE useradmin SET nom=:nom, email=:email, motdepasse1=:motdepasse1, motdepasse2=:motdepasse2 WHERE id=:id';

    $preparation = $db->prepare($sql);

    if ($preparation->execute([':nom' => $nom, ':email' => $email, ':motdepasse1' => $motdepasse1, ':motdepasse2' => $motdepasse2, 'id' => $id]) ) {
        header("location: ../index.php");

    }


}



?>






<link rel="stylesheet" href="../../css/signup.css">

<div id="modal" class="modal">
    <span onclick="closeToggle()" class="close" title="Close Modal">&times;</span>
<form class="modal-content" action="" method="post">
    <div class="container">
      <div class="form-title">
      <h1>Modifier Info User Admin</h1>
      <p>Veuillez saisir les champs concernés</p>
      </div>
      <div class="w3-panel w3-green">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
     <?php endif; ?>
      </div> 
      <hr>
      <div id="form-input">
    
      <!-- <label for="nom"><b>Nom</b></label> -->
      <input class="name" type="text" placeholder="Nom" name="nom" required>

      <!-- <label for="email"><b>Email</b></label> -->
      <input type="text" placeholder="Email" name="email" required>
      
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" placeholder="Mot de passe" name="psw" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label> -->
      <input type="password" placeholder="Répeter Mot de passe" name="psw-repeat" required>
    </div>
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Se souvenir de moi
      </label>

      <div class="clearfix">
        <button type="reset" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
        <button type="submit" name="envoyer" class="signupbtn">S'enrégister</button>
      </div>
    </div>
    <div class="w3-panel w3-yellow w3-card-4">
    <?php if (!empty($erreurMoDePasse)): ?>
        <p class="w3-red" ><?= $erreurMoDePasse; ?></p>
     <?php endif; ?>
  </div>
  </div>
  </form>
  


<script src="js/signup.js"></script>
