<?php

    session_start();
    $login = "";
    $prenom = "";
    $nom = "";
    
    include './model/modelUser.php';
    include './services/BddServices.php';
    include './utils/bddMySQL.php';


    //-> Si on est connecté, permet l'affichage des informations du comptes (stoké en $_SESSION)
    if(isset($_SESSION['connected'])){
        $login = $_SESSION['login'];
        $prenom = $_SESSION['firstname'];
        $nom = $_SESSION['name'];
    }



    if (isset($_POST['SubmitModifyUser'])) {
        echo 'submit modifyuser';
        if (
            isset($_POST['newName']) and !empty($_POST['newName'])
            and isset($_POST['newFirstname']) and !empty($_POST['newFirstname'])
        ) {
            echo $_SESSION['login'];
            $newName = htmlentities(strip_tags(stripslashes(trim($_POST['newName']))));
            $newFirstname = htmlentities(strip_tags(stripslashes(trim($_POST['newFirstname']))));
            $login = $_SESSION['login'];
    
            $modifyUser = new ModelUSer;
            $modifyUser->setName($newName);
            $modifyUser->setFirstname($newFirstname);
            $modifyUser->setLogin($login);
            $modifyUser->setBdd(new BddMySQL('localhost', 'tasks', 'root', ''));
    
            
            $response = $modifyUser->modifyUser();
    
            if (is_string($response)) {
                $_SESSION['name'] = $modifyUser->getName();
                $_SESSION['firstname'] = $modifyUser->getFirstname();
    
                header("Location: ./compte");
            }
        } else {
            $message = 'Veuillez remplir tout les champs';
            header("Location: ./compte");
        }
    }



    
    
    include './controller/controlerNav.php';
    include './view/header.php';
    include './view/nav.php'; //-> affiche la navbar
    include './view/vueCompte.php';
