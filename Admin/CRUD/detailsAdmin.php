<?php

    require ('../../database/db.php');


    $id = $_GET['id'];

    $sql = 'SELECT * FROM useradmin WHERE id=:id';

    $preparation = $db->prepare($sql);

    ?>

<?php if ($preparation->execute([':id' => $id])): 

$userAdmins = $preparation->fetchAll(PDO::FETCH_OBJ);

require ('header.php');



?> 

<table id="etudiants" class="w3-table w3-striped w3-border">
<tr class="w3-green">
  <th>ID</th>
  <th>Nom</th>
  <th>Email</th>
  <!-- <th>Action</th> -->
  <!-- <th>Mot de passe</th> -->

</tr>

<?php  foreach($userAdmins as $admin):  ?>

<tr>
  <td><?=$admin->id; ?></td>
  <td><?=$admin->nom; ?></td>
  <td><?=$admin->email; ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>














</body>
</html>
