<?php
 include './controller/controllerAccueil.php';

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
        $userConnection = new ModelUSer();
        $userConnection->setLogin($login);
        $userConnection->setPwd($password);
        $userConnection->setBdd(new BddMySQL('localhost', 'tasks', 'root', ''));
        //  var_dump($userConnection);
        $dataUser = $userConnection->loginUser();

        if (gettype($dataUser) == "array") {

            //Check of the userConnection and password check
            if (!empty($dataUser) and password_verify($password, $dataUser[0]['mdp_user'])) {
                echo 'pwd ok';
                //save Session Storage
                $_SESSION['id'] = $dataUser[0]['id_user'];
                $_SESSION['name'] = $dataUser[0]['name_user'];
                $_SESSION['firstname'] = $dataUser[0]['first_name_user'];
                $_SESSION['login'] = $userConnection->getLogin();
                $_SESSION['connected'] = true;

                $message = 'Vous êtes bien connecté.';

                //Refresh to index.php
                header('refresh:0');
            } else {
                echo "erreur 1";
                $messageConnexion = "Utilisateur ou Mot de Passe incorrect.";
                return $messageConnexion;
            }
        } else {
            echo 'erreur, $dataUser n\'est pas un array';
        }
    } else {
        echo "erreur 2";
        return $messageConnexion = "Veuillez remplir tous les champs.";
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
        //
        $newUser->setBdd(new BddMySQL('localhost', 'tasks', 'root', ''));


        $newUser->AddnewUser();

        return $newUser;
    } else {
        $messageTask = "Erreur";
    }
}
