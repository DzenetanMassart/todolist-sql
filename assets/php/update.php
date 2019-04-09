<?php
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];
echo $tache;


if($_POST['enregistrer']){
    $bdd->exec("INSERT INTO taches(texte,statut) VALUES ('".$tache."',0)");
}
header('Location: ../../index.php');



?>