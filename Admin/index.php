<?php 
session_start();

if (!isset($_SESSION['admin_id']) ) {
  header("Location: loginAdmin.php");
}

    require('../database/db.php');

    $sql = 'SELECT * FROM etudiant';
    $sql1 = 'SELECT * FROM useradmin';

    
    $preparation = $db->prepare($sql);
    $preparation1 = $db->prepare($sql1);


    $preparation->execute();
    $preparation1->execute();


    $etudiants = $preparation->fetchAll(PDO::FETCH_OBJ);
    $userAdmin = $preparation1->fetchAll(PDO::FETCH_OBJ);



    // require('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/tables.css">
</head>
<body>
<div class="w3-bar w3-black">
  <a href="../index.php" class="w3-bar-item w3-button w3-mobile w3-yellow">Accueil</a>
  <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-green">Tableau de Bord</a>
  <a href="CRUD/insererAdmin.php" class="w3-bar-item w3-button w3-mobile w3-blue">Inserer User Admin</a>

  <a href="#etudiants" class="w3-bar-item w3-button w3-mobile w3-teal">Etudiants</a>
  <a href="#userAdmin" class="w3-bar-item w3-button w3-mobile w3-indigo">User Admin</a>
  <div class="w3-dropdown-hover w3-mobile w3-right">
    <button class="w3-button">Compte <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
      <a href="#" class="w3-bar-item w3-button w3-mobile">Profile</a>
      <a href="logoutAdmin.php" class="w3-bar-item w3-button w3-mobile">Déconnexion</a>
    </div>
  </div>
</div>





<table id="etudiants" class="w3-table w3-striped w3-border">
<tr class="w3-green">
  <th>ID</th>
  <th>Prénom</th>
  <th>Nom</th>
  <th>Email</th>
  <th>Module</th>
  <th>Action</th>
  <!-- <th>Mot de passe</th> -->

</tr>

<?php  foreach($etudiants as $etudiant):  ?>

<tr>
  <td><?=$etudiant->id; ?></td>
  <td><?=$etudiant->prenom; ?></td>
  <td><?=$etudiant->nom; ?></td>
  <td><?=$etudiant->email; ?></td>
  <td><?=$etudiant->module; ?></td>

  <td>
    <a href="CRUD/detailsEtudiant.php?id=<?= $etudiant->id;?>" class=""><i class="fa fa-eye" style="font-size:48px;color:blue"></i></a>

    <a href="CRUD/modifierEtudiant.php?id=<?= $etudiant->id;?>" class=""><i class="fa fa-edit" style="font-size:48px;color:blue"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

    <a onclick="return confirm('Voulez-vous vraiment supprimer cet enrégistrement?')" href="CRUD/supprimerEtudiant.php?id=<?= $etudiant->id;?>" class=""><i class="fa fa-trash-o" style="font-size:48px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
  </td>






  
</tr>
<?php endforeach; ?>

</table>





<table id="userAdmin" class="w3-table w3-striped w3-border">
<tr class="w3-green">
  <th>ID</th>
  <th>Nom</th>
  <th>Email</th>
  <!-- <th>Mot de passe</th> -->

</tr>

<?php  foreach($userAdmin as $admin):  ?>

<tr>
  <td><?=$admin->id; ?></td>
  <td><?=$admin->nom; ?></td>
  <td><?=$admin->email; ?></td>

  <td>
    <a href="CRUD/detailsAdmin.php?id=<?= $admin->id;?>" class=""><i class="fa fa-eye" style="font-size:48px;color:blue"></i></a>

    <a href="CRUD/modifierAdmin.php?id=<?= $admin->id;?>" class=""><i class="fa fa-edit" style="font-size:48px;color:blue"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

    <a onclick="return confirm('Voulez-vous vraiment supprimer cet enrégistrement?')" href="CRUD/supprimerAdmin.php?id=<?= $admin->id;?>" class=""><i class="fa fa-trash-o" style="font-size:48px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
  </td>






  
</tr>
<?php endforeach; ?>

</table>























    
</body>
</html>