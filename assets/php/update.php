<?php
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];
echo $tache;


if($_POST['enregistrer']){
    $bdd->exec("INSERT INTO taches(texte,statut) VALUES ('".$tache."',0)");
}
header('Location: ../../index.php');



 
if(isset($_POST['retire'])){
	$count=count($_POST['retire']);
	for($i=0;$i<$count;$i++){
		$req_del="DELETE FROM $tache WHERE statut='".$_POST['retire'][$i]."';";
		mysql_query($req_del);
	}
}
?>