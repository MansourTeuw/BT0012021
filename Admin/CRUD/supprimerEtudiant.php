<?php 

require("../../database/db.php");

$id = $_GET["id"];

$sql = "DELETE FROM etudiant WHERE id=:id";

$preparation = $db->prepare($sql);

if ($preparation->execute([':id' => $id])) {
    header("Location: ../index.php");
}







?>