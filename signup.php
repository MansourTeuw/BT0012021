<?php 
session_start();

// if (isset($_SESSION['user_id']) ) {
//   header("Location: index.php");
// }





?>

<?php
require("database/db.php");

$message = "";


if (isset($_POST['envoyer'])) {
  if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['module']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) && $_POST['psw'] === $_POST['psw-repeat']) {

    $file = $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
    $folder="uploads/"; 
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ','-',$new_file_name);
    $image = "";

      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $telephone = $_POST['telephone'];
      $module = $_POST['module'];
      $motdepasse1 = password_hash($_POST['psw'], PASSWORD_BCRYPT);
      $motdepasse2 = password_hash($_POST['psw-repeat'], PASSWORD_BCRYPT);


      if(move_uploaded_file($file_loc,$folder.$final_file)) {
		$image = $final_file;
}

  $sql = "INSERT INTO etudiant (prenom, nom, email, telephone, module, motdepasse1, motdepasse2, image, status) VALUES (:prenom, :nom, :email, :telephone, :module, :motdepasse1, :motdepasse2, :image, 1)";

  $preparation = $db->prepare($sql);

  if ($preparation->execute([':prenom' => $prenom ,':nom' => $nom, ':email' => $email, ':telephone' => $telephone, ':module' => $module, ':motdepasse1' => $motdepasse1, ':motdepasse2' => $motdepasse2, ':image' => $image])) {
     $message = "
     <div class='w3-panel w3-green'>
        l'étudiant $prenom $nom a été inserré avec succés.
     </div>
     ";

     

  } else {
    $message = $erreurMoDePasse;
  }

    if ($motdepasse1 === $motdepasse2) {
      $erreurMoDePasse = "";

    } else {
      $erreurMoDePasse = "
      <div class='w3-panel w3-red'>
      Les deux mots de passe ne sont pas identiques.
   </div>
      ";
      
    }
        

     



    
  }
}

?>


<link rel="stylesheet" href="css/signup.css">
<link rel="stylesheet" href="css/w3.css">

<script type="text/javascript">

function validate()
      {
          var extensions = new Array("jpg","jpeg", "png");
          var image_file = document.regform.image.value;
          var image_length = document.regform.image.value.length;
          var pos = image_file.lastIndexOf('.') + 1;
          var ext = image_file.substring(pos, image_length);
          var final_ext = ext.toLowerCase();

          var imageError = document.getElementById("imageError");
          for (i = 0; i < extensions.length; i++)
          {
              if(extensions[i] == final_ext)
              {
              return true;
              
              }
          }
          // alert("Image Extension Not Valid (Use Jpg,jpeg)");
          imageError = "Image Extension Not Valid (Use Jpg,jpeg, png)";
          return false;
      }
      
</script>


<div id="modal" class="modal">
    <span onclick="closeToggle()" class="close" title="Close Modal">&times;</span>
<form class="modal-content" action="signup.php" method="post" autocomplete="nope" enctype="multipart/form-data">
    <div class="container">
      <div class="form-title">
      <h1>Inscription</h1>
      <p>Veuillez vous inscrire pour suivre une formation</p>
      </div>

      <p id="imageError" class='w3-red'></p>

      <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
     <?php endif; ?>
 
      <hr>
      <div id="form-input">
      <!-- <label for="prenom"><b>Prénom</b></label> -->
      <input class="name" type="text" placeholder="Prénom" name="prenom" required>

      <!-- <label for="nom"><b>Nom</b></label> -->
      <input class="name" type="text" placeholder="Nom" name="nom" required>

      <!-- <label for="email"><b>Email</b></label> -->
      <input type="email" placeholder="Email" name="email" autocomplete="nope" required>

      <input type="number" placeholder="+221 77 000 00 00" name="telephone" autocomplete="nope" required>


      
      <!-- <label for="email"><b>Email</b></label> -->
      <select name="module" id="module">
        <option value="">Choisir un module......</option>
        <option value="php">PHP Full Stack</option>
        <option value="js">JavaScript Full Stack</option>
        <option value="python">Python Full Stack</option>
        <option value="java">Java Full Stack</option>
      </select>
      
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" placeholder="Mot de passe" name="psw" autocomplete="nope" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label> -->
      <input type="password" placeholder="Répeter Mot de passe" name="psw-repeat" required>

      <label for="image">Image</label>
      <input type="file" placeholder="Avatar" name="image" id="image" required>

    </div><br>
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Se souvenir de moi
      </label>


      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="reset" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
        <button type="submit" name="envoyer" class="signupbtn">S'enrégister</button>
      </div>
      <a href="login.php">Connexion</a>
    </div>
  
  </div>
  </form>

  
  


<script src="js/signup.js"></script>
