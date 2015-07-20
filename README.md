# Objectif

Bien qu'aujourd'hui l'authentification par application soit devenue obsolète - remplacée par des services de connexion centralisés (Google, Facebook...) ou des annuaires distants (LDAP). Je crois qu'il est important de commencer par l'implémentation d'une authentification basique ! Ne serait-ce que pour avoir un exemple et une base de travail rapide.
Bien évidemment, ce code est un EXEMPLE qui mérite beaucoup d'améliorations - de fait, je vous invite tous à proposer des corrections et des améliorations !

# Technologies
Exemple de code pour faire une authentification avec les technologies :
- PHP 4
- MySQL
- JQuery

# Getting Started

Connecter vous à votre base de donnée MySQL (de préférence utiliser phpMyAdmin si vous ne maîtrisez pas bien le mode console)
Jouer le script de création de la table TABLE_USER : scriptCreationBDD.sql (via phpMyAdmin il faut copier/coller le contenu du fichier scriptCreationBDD dans l'onglet SQL)
Dans les pages qui le demandent (authentification.php et cible.php), modifier le login et mot de passe de connexion à la base de données.
Tester l'authentification avec le user *test@test.test* et mot de passe *1b2o3njourCommentVasTu*

# Principe

L'utilisateur se connecte via son email + un mot de passe sur la page login.php
(Cette page import le script authentification.js)

La demande d'authentification est validée via une requête AJAX vers authentification.php

La page authentification.php se charge de récupérer les informations (login/mdp) et :
- SI l'identification est ok ALORS met à jour le token et le timestamp dans la table des utilisateurs ET on redirige l'utilisateur vers la page cible.php 
- SINON la requête AJAX traite un cas de retour au status error : on affiche une popup d'erreur.

La page cible va vérifier que l'utilisateur est bien authentifiée avant d'afficher son contenu : On regarde en base si l'id de l'utilisateur correspond bien au token renvoyé par authentification.php.
- SI l'authentification est correcte ALORS on insère les valeurs (id et token) dans le DOM (le code HTML de la page) dans une balise div masquée (hidden) - ceci afin de les rendre disponible en JS pour les futurs besoins.
- SINON la page cible affiche une page d'erreur ou bien redirige automatiquement vers la page de login!

# JSON.php

Php 4 (typiquement utilisé avec les page perso free.fr) ne gère pas nativement la conversion des Array php en JSON.
Donc je passe par une librairie tiers afin de construire "manuellement" le résultat JSON. Je suis bien conscient que ce code peut être amélioré !

