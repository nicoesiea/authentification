# authentification
Example source code to authentification

Ce code permet de mettre rapidement en place un systeme d'authentification via :
- PHP
- MySQL
- JQuery
- 
# Utilisation

L'utilisateur se connecte via son email + un mot de passe
La requête est validée en AJAX via authentification.php
Cette page se charge de récupérer les informations (GET) afin de mettre à jour la table USER si l'identification est ok.
Une fois l'identification terminée, on redirige l'utilisateur vers la page cible.

Cette page cible va vérifier que l'utilisateur est bien authentifiée avant d'afficher le reste de la page
