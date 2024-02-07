<?php
session_start();
//CONTROLLER DE LA PAGE ACCUEIL : faire l'intermédiaire entre le MODEL et la VUE. Prendre les Décision if... else. Dire à la Vue comment afficher les infos.


//J'importe les ressources dont j'ai besoin
include './model/modelUser.php';
include './model/modelArticles.php';


$formCo = "<h1>Accueil</h1>"; //-> Affiche Accueil à la place du Formulaire de Connexion si on est Connecté
$formSign = "";
$message = "";
$messageTask = "";
$myArticlesTitle = "";
$myArticles = "";


//-> Affiche le Formulaire de Connexion si on n'est pas Connecté
if (!isset($_SESSION['connected'])) {
    $formCo = '
    <form action="connexion.php" method="post">
    <h2>Connexion</h2>
    <input type="text" name="login" placeholder="Votre Login">
    <input type="password" name="password" placeholder="Votre Mot de Passe">
    <input type="submit" name="submit" value="Se Connecter">
    </form>';
}

// Affiche la creation de compte si on est connecte
if (!isset($_SESSION['connected'])) {
    $formSign = '
    <h2>Creer un compte</h2>
    <form action="connexion.php" method="post">
    <input type="text" name="name" placeholder="Nom">
    <input type="text" name="firstname" placeholder="Prénom">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="pwd" placeholder="Mot de passe">
    <input type="submit" name="submitNewUser">
</form>';
}

include './myArticles.php';
include './controlerNav.php';
include './view/header.php';
include './view/nav.php'; //-> affiche la navbar
include './view/vueAccueil.php';



