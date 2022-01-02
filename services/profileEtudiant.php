<?php
// session_start();
// if (!isset($_SESSION['user_id']) ) {
//   header("Location: ../login.php");
// }
    require ('../database/db.php');
    require ('headerServices.php');



    $id = $_GET['id'];

    $sql = 'SELECT * FROM etudiant WHERE id=:id';

    $preparation = $db->prepare($sql);

    ?>

<?php if ($preparation->execute([':id' => $id])): 

$etudiants = $preparation->fetchAll(PDO::FETCH_OBJ);




?> 

<table class="w3-table w3-striped w3-border">
<tr class="w3-green">
  <th>ID</th>
  <th>Prénom</th>
  <th>Nom</th>
  <th>Email</th>
  <th>Module</th>
  <th>Réinitialiser Mot de Passe</th>
  <!-- <th>Mot de passe</th> -->

</tr>

<?php  foreach($etudiants as $etudiant):  ?>

<tr>
  <td><?=$etudiant->id; ?></td>
  <td><?=$etudiant->prenom; ?></td>
  <td><?=$etudiant->nom; ?></td>
  <td><?=$etudiant->email; ?></td>
  <td><?=$etudiant->module; ?></td>
  <td><a href="reinitialiser.php?id=<?= $etudiant->id;?>">Cliquer ici</a></td> 

</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>














</body>
</html>
