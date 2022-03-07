<?php
session_start();
require("../database/db.php");


?>

<?php 

if (isset($_POST['connexion'])) {
  if (!empty($_POST["email"]) && !empty($_POST["psw"]) ) {
    $requete = $db->prepare('SELECT * FROM admin WHERE email = :email');
  
    $requete->bindParam(':email', $_POST['email']);
  
    
    $requete->execute();
    $resultats = $requete->fetch(PDO::FETCH_ASSOC);
  
    if (count(array($resultats)) > 0 && password_verify($_POST['psw'], $resultats['motdepasse1']) ) {
      $_SESSION['admin_id'] = $resultats['id'];
      $message = "";

      header("Location: index.php");
  
    } else {
      $message = 'Désolé identifiant ou mot de passe invalide';

  
    }
  
  
  }
}


?>






<link rel="stylesheet" href="../css/w3.css"> 
    <link rel="stylesheet" href="../css/style2.css">
    
    <form class="box" action="" method="post">
    <div class="w3-panel w3-yellow w3-card-4">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
      <?php endif?>
     </div>
       <h1>Admin Login </h1> 
       <input type="email" name="email" value="" placeholder="Email">
       <input type="password" name="psw" placeholder="Mot de passe">
       <div class="clearfix">
         <div class="loginButton">
           </div>
       <input type="reset" class="btn" id="red" name="" value="Annuler">
       <input type="submit" class="btn" name="connexion" value="Connexion">
       </div>
       <button class="redirectBtn"><a href="signupAdmin.php">Inscription</button></a>
       </div>
    </form>
</body>
</html>
<!-- <script src="../js/signup.js"></script> -->

