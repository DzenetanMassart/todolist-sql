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
    if(isset($_POST['conserve'])){
        $count=count($_POST['conserve']);
        for($i=0;$i<$count;$i++){
            if($_POST['UNDONE'])
            $archivage="UPDATE `taches` SET `statut` = '1' WHERE `taches`.`id` = $i;";
            mysql_query($archivage);
        }
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    $bdd->rollback();
}

header('Location: ../../index.php');

?>