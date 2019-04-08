<?php
/* cette page sert à gérer la liste des tâches en cours */
include 'connect.php';
try
{
    $bdd->beginTransaction();
    $push = $bdd->prepare("
        INSERT INTO taches 
            (texte) 
        VALUES 
            (:texte)
    ");
    $push->execute(array(':texte' => $_POST['plusTache']));
    $push->closeCursor();
    $bdd->commit();
    echo "Nouvelle tache enregistrée";
} catch(Exception $e) {
    
    echo 'Erreur : ' . $e->getMessage();
    $bdd->rollback();
}



?>