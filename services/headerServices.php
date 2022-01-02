<?php

session_start();

require ('../database/db.php');

// if (isset($_GET['id'])) 

    // $id = $_GET['id'];

$sql = 'SELECT * FROM etudiant';
// $sql1 = 'SELECT * FROM useradmin';


$preparation = $db->prepare($sql);
// $preparation1 = $db->prepare($sql1);


$preparation->execute();
// $preparation1->execute();


$etudiants = $preparation->fetchAll(PDO::FETCH_OBJ);
// $userAdmin = $preparation1->fetchAll(PDO::FETCH_OBJ);



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
    <div class="w3-bar w3-black w3-top">
        <a href="../index.php" class="w3-bar-item w3-button w3-mobile">Accueil</a>
        <a href="#contact-form" class="w3-bar-item w3-button w3-mobile">Contact</a>
        <div class="w3-mobile w3-right" id="">
        <input type="text" name="" id="" class="w3-bar-item w3-input w3-mobile" placeholder="Search...">
        <a href="#" class="w3-bar-item w3-button w3-green w3-mobile">GO</a>

        <div class="w3-dropdown-hover w3-mobile">
        <button class="w3-button">Compte <i class="fa fa-caret-down"></i></button>
        <div id="submenu" class="w3-dropdown-content w3-bar-block">

        <a href=" <?php foreach ($etudiants as $etudiant): ?>
        profileEtudiant.php?id=<?= $etudiant->id;?> <?php endforeach; ?>" class="w3-bar-item w3-button w3-mobile">Profile</a>

        <a href="../logout.php" class="w3-bar-item w3-button w3-mobile">Déconnecter</a>
    </div>
  </div>
        </div>
    </div>



   