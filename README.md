# todolist-sql

## But

Créer Trois formulaires:

1.Les tâches=>Bouton "archivé"
2.Les tâches faîtes => bouton "supprimer"
3.Introduire une tâche =>bouton "enregistrer"

Lorsqu'on introduit une tâche, elle doit apparaître dans le formulaire "les tâches" et c'est lorsqu'elle est cochée qu'elle est archivée !

## Système de Dzénetan

Les tâches ont chacunes 3 infos: L'ID,le texte et le statut!
Le ID représente la place dans la liste,
Le texte représente la tâche écrite,
Le statut indique si (statut=0) la tâche se trouve dans la liste de base ou si (statut=1) la tâche se trouve dans la liste des archivées !

Pour incrémenter le statut, on doit cocher une checkbox !

## Problème de Dzénetan

Malgrer des recherches assez poussée dans l'emploi des checkboxs avec les databases SQL, impossible de sélectionner les checkboxs cochées pour leurs changer le statut de "0" à "1" !

## Ce qui est fait

L'enregistrement des tâches est fonctionnel !


