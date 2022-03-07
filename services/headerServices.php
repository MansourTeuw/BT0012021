<?php

session_start();

require ('../database/db.php');

// if (isset($_GET['id'])) 

    // $id = $_GET['id'];

    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
    } else {
     $id = $_SESSION['user_id'];
    
     
    }
    

$sql = 'SELECT * FROM etudiant WHERE id=:id';

$preparation = $db->prepare($sql);

if ($preparation->execute([':id' => $id])):

$etudiants = $preparation->fetchAll(PDO::FETCH_OBJ);


?>




<!DOCTYPE htmhol>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daaraji</title>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/services.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="css/style2.css"> -->


</head>
<body>
    <!-- <div class="w3-bar w3-black w3-top w3-border">
        <a href="../index.php" class="w3-bar-item w3-button w3-mobile">Accueil</a>
        <a href="#contact-form" class="w3-bar-item w3-button w3-mobile">Contact</a>
        <div class="w3-mobile w3-right" id="">
        <input type="text" name="" id="" class="w3-bar-item w3-input w3-mobile" placeholder="Search...">
        <a href="#" class="w3-bar-item w3-button w3-green w3-mobile">GO</a>

        <div class="w3-dropdown-hover w3-mobile">
       

        <div class="profile" style="">

            <button class="w3-button"> <img src='../uploads/' alt=''> <i class="fa fa-caret-down"></i></button>
        </div>

        
        <div id="submenu" class="w3-dropdown-content w3-bar-block">

        <a href="" class="w3-bar-item w3-button w3-mobile">Profile</a>

        <a href="../logout.php" class="w3-bar-item w3-button w3-mobile">Déconnecter</a>
    </div>
  </div>



        </div>
    </div> -->


    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large" style="margin-top:25%;">Close &times;</button>
    <?php foreach($etudiants as $etudiant): ?>

<div class="w3-card-4 w3-dark-grey" style="width:105%; heigth:5%;">

<div class="w3-container w3-center">
  <h3>Profile</h3>
  <img src='../uploads/<?= $etudiant->image; ?>' alt='' class="w3-image" >
  <h4><?= $etudiant->prenom; ?> <?= $etudiant->nom; ?></h4>
  <h6><i class="fa fa-envelope w3-tiny" style="color:blue"></i> <?= $etudiant->email; ?></h6>
  <h6><i class="fa fa-phone" style="color:green"></i> <?= $etudiant->telephone; ?></h6>
  <h6><i class="fa fa-code"></i> <?= $etudiant->module; ?></h6>

  <!-- <button class="w3-button w3-green" >Accept</button>
  <button class="w3-button w3-red" >Decline</button> -->
</div>

</div>


  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home w3-xxxlarge"></i>Accueil</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="../logout.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-sign-out w3-large" aria-hidden="true"></i>Déconnecter</a>
</div>
<?php endforeach; ?>
<?php endif; ?>

<!-- Page Content -->
<div class="w3-top">
  <button class="w3-button w3-teal w3-large" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <!-- <h4>PROFILE </h4> -->
  </div>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>



   