<?php
// include './index.php';

//////////////////////   Modification compte  /////////////////////////////
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
