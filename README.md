# Authentification
Exemple de code pour faire une authentification avec les technologies :
- PHP 4
- MySQL
- JQuery

# Getting Started

Connecter vous à votre base de donnée MySQL (de préférence utiliser phpMyAdmin si vous ne maîtrisez pas bien le mode console)
Jouer le script de création de la table TABLE_USER : scriptCreationBDD.sql (via phpMyAdmin il faut copier/coller le contenu du fichier scriptCreationBDD dans l'onglet SQL)
Dans les pages qui le demandent (authentification.php et cible.php), modifier le login et mot de passe de connexion à la base de données. 
Tester l'authentification avec le user +test@test.test+ et mot de passe +1b2o3njourCommentVasTu+

# Principe

L'utilisateur se connecte via son email + un mot de passe sur la page login.php
(Cette page import le script authentification.js)

La demande d'authentification est validée via une requête AJAX vers authentification.php

La page authentification.php se charge de récupérer les informations (login/mdp) afin de mettre à jour la table des utilisateurs SI l'identification est ok.
Une fois l'identification terminée, on redirige l'utilisateur vers la page cible.php.

Cette page cible va vérifier que l'utilisateur est bien authentifiée avant d'afficher son contenu. Sinon elle affiche une page d'erreur !

# JSON.php

Php 4 (typiquement utilisé avec les page perso free.fr) ne gère pas nativement la conversion des Array php en JSON.
Donc je passe par une librairie tierse afin de construire "manuellement" le résultat JSON. Je suis bien conscient que ce code peut être amélioré !
