<?php
/* cette page sert à gérer la liste des tâches en cours */
include 'connect.php';
try{

    if(isset($_POST['conserve']))
{
 
    $checkbox_cochee=$_POST['UNDONE'];
    $bdd->exec("UPDATE taches 
    SET statut='1'
    WHERE texte='$checkbox_cochee'

");}


    if(isset($_POST['conserve_tout']))
{
     $bdd->exec("UPDATE taches 
    SET statut='1'

");}

} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    $bdd->rollback();
}


header('Location: ../../index.php');


?>