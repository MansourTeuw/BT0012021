<?php

require("../../database/db.php");
require('../CRUD/header.php');

$message = "";

if (isset($_POST['envoyer']) ) {
  if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) ) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse1 = $_POST['psw'];
    $motdepasse2 = $_POST['psw-repeat'];
  
    $erreurMoDePasse = "";

    if ($motdepasse1 != $motdepasse2) {
      
      $erreurMoDePasse = "Les deux mots de passe ne corespondent pas";
    }
  
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw-repeat']) && $_POST['psw'] === $_POST['psw-repeat'] ) {
      $sql = 'INSERT INTO useradmin (nom, email, motdepasse1, motdepasse2) VALUES (:nom, :email, :motdepasse1, :motdepasse2)';
  
      $stmt = $db->prepare($sql);
  
      if ($stmt->execute([':nom' => $nom, ':email' => $email, ':motdepasse1' => $motdepasse1, ':motdepasse2' => $motdepasse2])) {
    
        $message = "User Admin inseré avec succès!!!";
      } else {
        $message = "Désolé il doit y avoir une ERREUR en créant votre compte";
      
      }
    }
  
  } 
}


?>










<link rel="stylesheet" href="../../css/signup.css">

<!-- <div id="modal" class="modal">
    <span onclick="closeToggle()" class="close" title="Close Modal">&times;</span> -->
    <div id="userAdmin">
<form class="modal-content" action="" method="post" autocomplete="off">
    <div class="container">
      <div class="form-title">
      <h1>Inserer Admin</h1>
      </div>
      <div class="w3-panel w3-green">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
     <?php endif; ?>
      </div> 
      <hr>
      <div id="form-input">
    <!-- <label for="email"><b>Email</b></label> -->
      <input type="text" placeholder="Nom Complet" name="nom" required>
      <!-- <label for="email"><b>Email</b></label> -->
      <input type="email" placeholder="Email" name="email" required>      
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" placeholder="Mot de passe" name="psw" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label> -->
      <input type="password" placeholder="Répeter Mot de passe" name="psw-repeat" required>
    </div>
      <label>
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
  </form>
  </div>

  


<!-- <script src="../js/signup.js"></script> -->





</body>
</html>
