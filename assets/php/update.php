<?php
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];
echo $tache;


if($_POST['enregistrer']){
    $bdd->exec("INSERT INTO taches(texte) VALUES ('".$tache."')");
}



if (isset($_POST['retire'])) {
    try
    {
        $bdd->beginTransaction();
        $push = $bdd->prepare("
            DELETE FROM taches 
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
            UPDATE taches
            SET id = 1 
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
header('Location: ../../index.php');



?>