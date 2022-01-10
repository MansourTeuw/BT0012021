<?php
session_start();

// if (isset($_SESSION['user_id'])) {
//   // header("Location: $url");
// }

// require('header.php'); 

require("database/db.php");

?>


<?php

    if (!empty($_POST["email"]) && !empty($_POST["psw"]) ) {
        $requete = $db->prepare('SELECT * FROM etudiant WHERE email = :email');

        // $requete->bindParam(':prenom', $_POST['prenom']);
        // $requete->bindParam(':nom', $_POST['nom']);
        $requete->bindParam(':email', $_POST['email']);
        // $requete->bindParam(':module', $_POST['module']);
        // $requete->bindParam(':motdepasse1', $_POST['psw']);
        $requete->execute();
        $resultats = $requete->fetch(PDO::FETCH_ASSOC);
        

        if (count(array($resultats)) > 0 && password_verify($_POST['psw'], $resultats['motdepasse1']) ) {
            $_SESSION['user_id'] = $resultats['id'];
            $_SESSION['user_module'] = $resultats['module'];

            $url = "";
            $message = "";

            switch($_SESSION['user_module']){
              case "php":
                $url = "services/espaceEtudiantPHP.php";
                break;
              case "js":
                $url = "services/espaceEtudiantJS.php";
                break;
              case "python":
                $url = "services/espaceEtudiantPython.php";
                break;
              case "java":
                $url = "services/espaceEtudiantJava.php";
                break;
              default:
                echo "url invalie";
                break;
            }
            header("Location: $url");
        } else {
            $message = 'Désolé identifiant ou mot de passe invalide';
    
        }
    }

?>











    <link rel="stylesheet" href="css/w3.css"> 
    <link rel="stylesheet" href="css/style2.css">
    
    <form class="box" action="login.php" method="post">
    <div class="w3-panel w3-orange w3-card-4">
      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
      <?php endif?>
     </div>
       <h1>Connexion </h1> 
       <input type="email" name="email" value="" placeholder="Email">
       <input type="password" name="psw" placeholder="Mot de passe">
       <div id="clearfix">
       <input id="red" class="btn" type="reset" name="" value="Annuler">
       <input  class="btn" type="submit" name="" value="Connexion">
       <a href="signup.php">Ou S'inscrire</a>
       </div>
    </form>
</body>
</html>

