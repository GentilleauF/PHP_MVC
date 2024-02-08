<?php
session_start();
//CONTROLLER DE LA PAGE ACCUEIL : faire l'intermédiaire entre le MODEL et la VUE. Prendre les Décision if... else. Dire à la Vue comment afficher les infos.


//J'importe les ressources dont j'ai besoin
include './model/modelUser.php';
include './model/modelArticles.php';
include './services/BddServices.php';
include './utils/bddMySQL.php';



$formCo = "<h1>Accueil</h1>"; //-> Affiche Accueil à la place du Formulaire de Connexion si on est Connecté
$formSign = "";
$message = "";
$messageConnexion = "";
$messageTask = "";
$myArticlesTitle = "";
$myArticles = "";


//-> Affiche le Formulaire de Connexion si on n'est pas Connecté
if (!isset($_SESSION['connected'])) {
    $formCo = '
    <form action="connexion" method="post" class=" px-8">
    <h2 class="text-lg font-semibold mt-10">Connexion</h2>
    <input type="text" name="login" placeholder="Votre Login" class="border p-1 rounded-md m-2">
    <input type="password" name="password" placeholder="Votre Mot de Passe" class="border p-1 rounded-md m-2">
    <input type="submit" name="submit" value="Se Connecter" class="bg-blue-500 p-1 px-2 text-white rounded m-2">
    </form>';
}

// Affiche la creation de compte si on est connecte
if (!isset($_SESSION['connected'])) {
    $formSign = '
    <form action="connexion" method="post" class="px-8">
    <h2 class="text-lg font-semibold mt-10">Creer un compte</h2>
    <input type="text" name="name" placeholder="Nom" class="border p-1 rounded-md m-2">
    <input type="text" name="firstname" placeholder="Prénom" class="border p-1 rounded-md m-2">
    <input type="text" name="login" placeholder="Login" class="border p-1 rounded-md m-2">
    <input type="text" name="pwd" placeholder="Mot de passe" class="border p-1 rounded-md m-2">
    <input type="submit" name="submitNewUser" class="bg-blue-500 p-1 px-2 rounded text-white m-2">
</form>';
}

include './controller/myArticles.php';
include './controller/controlerNav.php';
include './view/header.php';
include './view/nav.php'; //-> affiche la navbar
include './view/vueAccueil.php';



