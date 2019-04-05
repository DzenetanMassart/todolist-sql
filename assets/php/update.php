<?php
/* Cette page sert à mettre à jour le tableau */
require 'connect.php';
if (isset($_POST['retire'])) {
    
    try
    {
        $bdd->beginTransaction();
        $push = $bdd->prepare("
            DELETE FROM tâches 
            WHERE id = :id
        ");
        foreach ($_POST as $value) {
            $push->execute(array(':id' => $value));
        }
        $push->closeCursor();
        $bdd->commit();
    } catch(Exception $e) {

        echo 'Erreur : ' . $e->getMessage();
        $bdd->rollback();
    }
}elseif (isset($_POST['conserve'])) {
    try
    {
        $bdd->beginTransaction();
        $push = $bdd->prepare("
            UPDATE tâches
            SET statut = 1 
            WHERE id = :id 
        ");
        foreach ($_POST as $value) {
            $push->execute(array(':id' => $value));
        }
        $push->closeCursor();
        $bdd->commit();
    } catch(Exception $e) {

        echo 'Erreur : ' . $e->getMessage();
        $bdd->rollback();
    }
}
header('Location: ../index.php');



?>