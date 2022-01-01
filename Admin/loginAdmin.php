<?php
session_start();

if (isset($_SESSION['admin_id']) ) {
  header("Location: login.php");
}

require("../database/db.php");

?>

<?php 

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
    $message = 'Désolé identifiants invalides';

  }


}


?>






<link rel="stylesheet" href="../css/w3.css"> 
    <link rel="stylesheet" href="../css/style2.css">
    
    <form class="box" action="index.php" method="post">
    <div class="w3-panel w3-yellow w3-card-4">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
      <?php endif?>
     </div>
       <h1>Admin Login </h1> 
       <input type="email" name="email" value="" placeholder="Email">
       <input type="password" name="psw" placeholder="Mot de passe">
       <div class="clearfix">
       <input type="reset" name=" "value="Annuler">
       <input type="submit" name=" "value="Connexion">
       </div>
    </form>
</body>
</html>
<!-- <script src="../js/signup.js"></script> -->

