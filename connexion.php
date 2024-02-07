<?php
include './index.php';

/////////////////////// CONNECTION  /////////////////////////////
if (isset($_POST['submit'])) {
    //Check if inputs arent empty
    if (
        isset($_POST['login']) and !empty($_POST['login'])
        and isset($_POST['password']) and !empty($_POST['password'])
    ) {
        //Sanitize data
        $login = htmlentities(strip_tags(stripslashes(trim($_POST['login']))));
        $password = htmlentities(strip_tags(stripslashes(trim($_POST['password']))));

        //New user
         $newUser = new ModelUSer();
         $newUser->setLogin($login);
         $newUser->setPwd($password);
         var_dump($newUser);
         $dataUser = $newUser->loginUser();
         var_dump($dataUser);
        

        if (gettype($dataUser) == "array") {
            echo 'type ok';
            
            //Check of the newuser and password check
            if (!empty($dataUser) and password_verify($password, $dataUser[0]['mdp_user'])) {
                echo 'pwd ok';
                //save Session Storage
                $_SESSION['id'] = $dataUser[0]['id_user'];
                $_SESSION['name'] = $dataUser[0]['name_user'];
                $_SESSION['firstname'] = $dataUser[0]['first_name_user'];
                $_SESSION['login'] = $newUser->getLogin();
                $_SESSION['connected'] = true;

                $message = 'Vous êtes bien connecté.';
                
                //RRefresh to index.php
                header('refresh:0');
            } else {
                $message = "Utilisateur ou Mot de Passe incorrect.";
            }
        } else {
            echo 'erreur, $dataUser n\'est pas un array';
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}







//////////// Create account //////////////////////
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
        $newUser = new ModelUSer();
        $newUser->setLogin($login);
        $newUser->setName($name);
        $newUser->setFirstname($firstname);
        $newUser->setPwd($pwd);

        $newUser->AddnewUser();

    } else {
        $messageTask = "Erreur";
    }
}





