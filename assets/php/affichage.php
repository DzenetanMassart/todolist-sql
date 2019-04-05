
<?php
/* cette page sert à générer les deux listes de tâches */

require 'connnect.php';
	$resultat = $bdd->query('SELECT * FROM tâches WHERE statut = 0');
	while ($donnees = $resultat->fetch())
	{
         $en_cours= '
         <div>
         <input type="checkbox" id="'.$donnees['id'].'" name="'.$donnees['id'].'"" value="'.$donnees['id'].'">
         <label for="'.$donnees['id'].'" class="nodone">
         '.$donnees['id'].' | '.$donnees['texte'].'
         </label>
         </div>
         ';
	}
	$resultat->closeCursor();
	$resultat = $bdd->query('SELECT * FROM tâches WHERE statut = 1');
	while($donnees = $resultat->fetch())
	{
        $termined = '
        <div>
        <input type="checkbox" id="'.$donnees['id'].'" name="'.$donnees['id'].'"" value="'.$donnees['id'].'">
        <label for="'.$donnees['id'].'" class="done">
        '.$donnees['id'].' | '.$donnees['texte'].'
        </label>
        </div>
        ';
	}
	$resultat->closeCursor();



?>