<?php
//montre les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];


if($_POST['enregistrer'])
{
    $bdd->exec("INSERT INTO taches(texte,statut) VALUES ('".$tache."',0)");
}



if(isset($_POST['retire'])){

    if(isset($_POST['DONE']))
    
    {$fait=$_POST['DONE'];
    
        $request = $bdd->prepare("DELETE FROM taches WHERE id =:id");
        foreach($fait as $ii){
            $request->execute(array(":id" => $ii));
       };
    };
    };




if(isset($_POST['retire_tout']))
{
    $bdd->exec("DELETE FROM taches WHERE statut=1");
};

header('Location: ../../index.php');

?>