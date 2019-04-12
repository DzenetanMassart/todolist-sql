<?php
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];
echo $tache;


if($_POST['enregistrer']){
    $bdd->exec("INSERT INTO taches(texte,statut) VALUES ('".$tache."',0)");
}
 
 
if(isset($_POST['retire'])){
 
    $checkbox_cocheesuppr=$_POST['DONE'];
	$bdd->exec("DELETE FROM taches 
	WHERE texte='$checkbox_cocheesuppr'");
};

if(isset($_POST['retire_tout'])){
 
    $checkbox_cocheesuppr=$_POST['DONE'];
	$bdd->exec("DELETE FROM taches WHERE statut=1");
};

header('Location: ../../index.php');

?>