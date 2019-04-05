<?php
/* cette page sert à gérer la liste des tâches en cours */
require 'connection.php';
try
{
    $bdd->beginTransaction();
    $push = $bdd->prepare("
        INSERT INTO tâches 
            (texte) 
        VALUES 
            (:texte)
    ");
    $push->execute(array(':texte' => $_POST['plusTache']));
    $push->closeCursor();
    $bdd->commit();
    echo "Nouvelle tâche enregistrée";
} catch(Exception $e) {
    
    echo 'Erreur : ' . $e->getMessage();
    $bdd->rollback();
}
header('Location: ../index.php');



?>