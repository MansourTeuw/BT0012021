<?php

    require ('../../database/db.php');


    $id = $_GET['id'];

    $sql = 'SELECT * FROM etudiant WHERE id=:id';

    $preparation = $db->prepare($sql);

    ?>

<?php if ($preparation->execute([':id' => $id])): 

$etudiants = $preparation->fetchAll(PDO::FETCH_OBJ);

require ('../header.php');



?> 

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
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>














</body>
</html>
