<?php
include './index.php';

/////////////////////// CONNEXION  /////////////////////////////
if (isset($_POST['submit'])) {
    //Vérification du remplissage des champs
    if (
        isset($_POST['login']) and !empty($_POST['login'])
        and isset($_POST['password']) and !empty($_POST['password'])
    ) {
        //Nettoyer les datas
        $login = htmlentities(strip_tags(stripslashes(trim($_POST['login']))));
        $password = htmlentities(strip_tags(stripslashes(trim($_POST['password']))));

        //J'appel le Model pour récupérer mon utilisateur
        $data = loginUser($login);

        //Test la réponse renvoyer par le Model
        if (gettype($data) == "object") {
            $message = $data->getMessage();
        } else {

            //ETAPE 8 Du Diagramme de Sequence : vérifier l'existence de l'utilidateur, et vérifier le mot de passe
            if (!empty($data) and password_verify($password, $data[0]['mdp_user'])) {

                //ETAPE 9 Du Diagramme de Sequence : enregistrer les datas en $_SESSION
                $_SESSION['id'] = $data[0]['id_user'];
                $_SESSION['name'] = $data[0]['name_user'];
                $_SESSION['firstname'] = $data[0]['first_name_user'];
                $_SESSION['login'] = $data[0]['login_user'];
                $_SESSION['connected'] = true;

                //ETAPE 10 Du Diagramme de Sequence : message de confirmation
                $message = 'Vous êtes bien connecté.';

                //Redirection vers index.php pour rafraîchir la page
                header('refresh:0');
            } else {
                $message = "Utilisateur ou Mot de Passe incorrect.";
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}







////////////// Creation de compte //////////////////////
if (isset($_POST['submitNewUser'])) {

    if (
        isset($_POST['name']) and !empty($_POST['name'])
        and isset($_POST['firstname']) and !empty($_POST['firstname'])
        and isset($_POST['login']) and !empty($_POST['login'])
        and isset($_POST['pwd']) and !empty($_POST['pwd'])
    ) {
        echo 'etape1';

        $name = htmlentities(strip_tags(stripslashes(trim($_POST['name']))));
        $firstname = htmlentities(strip_tags(stripslashes(trim($_POST['firstname']))));
        $login = htmlentities(strip_tags(stripslashes(trim($_POST['login']))));
        $pwd = htmlentities(strip_tags(stripslashes(trim($_POST['pwd']))));
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);

        // APPEL DE LA BDD
        AddnewUser($name, $firstname, $login, $pwd);
    } else {
        $messageTask = "Erreur";
    }
}





