<?php
session_start();

if (isset($_SESSION['admin_id']) ) {
  header("Location: index.php");
}

require("../database/db.php");


$message = "";

?>

<?php

  if (isset($_POST['envoyer']) ) {
    if (isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat'])) {
      $motdepasse1 = $_POST['psw'];
      $motdepasse2 = $_POST['psw-repeat'];

      $erreurMoDePasse = "";

      if ($motdepasse1 != $motdepasse2) {
    
        $erreurMoDePasse = "Les deux mots de passe ne corespondent pas";
      }

      if (!empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw-repeat'])  && $_POST['psw'] === $_POST['psw-repeat'] ) {

        $sql = "INSERT INTO admin (email, motdepasse1, motdepasse2) VALUES (:email, :motdepasse1, :motdepasse2)";

      $stmt = $db->prepare($sql);

      $stmt->bindParam(':email', $_POST['email']);
      $stmt->bindParam(':motdepasse1', password_hash($_POST['psw'], PASSWORD_BCRYPT));
      $stmt->bindParam(':motdepasse2', password_hash($_POST['psw-repeat'], PASSWORD_BCRYPT));

      if ($stmt->execute()) {
        $message = "Un élément a été enrégistré avec succés!!!";
      } else {
        $message = "Désolé il doit y avoir une ERREUR en créant votre compte";
  
      }
  


      }

    }
  }





?>




<link rel="stylesheet" href="../css/signup.css">
<link rel="stylesheet" href="../css/w3.css">

<!-- <div id="modal" class="modal">
    <span onclick="closeToggle()" class="close" title="Close Modal">&times;</span> -->
<form class="modal-content" action="signupAdmin.php" method="post" autocomplete="off">
    <div class="container">
      <div class="form-title">
      <h1>Inscription Admin</h1>
      </div>
      <div class="w3-panel w3-green">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
     <?php endif; ?>
      </div> 
      <hr>
      <div id="form-input">
      <!-- <label for="email"><b>Email</b></label> -->
      <input type="email" placeholder="Email" name="email" required>      
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" placeholder="Mot de passe" name="psw" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label> -->
      <input type="password" placeholder="Répeter Mot de passe" name="psw-repeat" required>
    </div>
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Se souvenir de moi
      </label>


      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="reset" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
        <button type="submit" name="envoyer" class="signupbtn">S'enrégister</button>
        <a href="loginAdmin.php">Se connecter</a>
      </div>
    </div>
    <div class="w3-panel w3-yellow w3-card-4">
    <?php if (!empty($erreurMoDePasse)): ?>
        <p class="w3-red" ><?= $erreurMoDePasse; ?></p>
     <?php endif; ?>
  </div>
  </div>
  </form>
  


<!-- <script src="../js/signup.js"></script> -->
