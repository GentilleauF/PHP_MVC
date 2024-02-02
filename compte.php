<?php
    session_start();
    $login = "";
    $prenom = "";
    $nom = "";

    //-> Si on est connecté, permet l'affichage des informations du comptes (stoké en $_SESSION)
    if(isset($_SESSION['connected'])){
        $login = $_SESSION['login'];
        $prenom = $_SESSION['firstname'];
        $nom = $_SESSION['name'];
    }
    
    include './controlerNav.php';
    include './view/header.php';
    include './view/nav.php'; //-> affiche la navbar
    include './view/vueCompte.php';
