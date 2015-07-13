# Authentification
Example source code to authentification

Ce code permet de mettre rapidement en place un systeme d'authentification via :
- PHP
- MySQL
- JQuery

# Utilisation

L'utilisateur se connecte via son email + un mot de passe sur la page login.php
(Cette page import le script authentification.js)

La demande d'authentification est validée via une requête AJAX vers authentification.php

La page authentification.php se charge de récupérer les informations (login/mdp) afin de mettre à jour la table des utilisateurs SI l'identification est ok.
Une fois l'identification terminée, on redirige l'utilisateur vers la page cible.php.

Cette page cible va vérifier que l'utilisateur est bien authentifiée avant d'afficher son contenu. Sinon elle affiche une page d'erreur !

# 
