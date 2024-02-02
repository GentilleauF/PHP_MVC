<?php
//MODEL : Gérer les Datas et l'Accès à la BDD

function loginUser($login)
{
    //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
    try {
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');

        //Binding de Paramètre
        $req->bindParam(1, $login, PDO::PARAM_STR);

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();

        //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (Exception $error) {
        return $error;
    }
}



function AddnewUser($name, $firstname, $login, $pwd)
{
    try {
        //ETAPE 8 : Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //ETAPE 9 : Requête préparée
        $req = $bdd->prepare('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

        //ETAPe 10 : Binding Param
        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $firstname, PDO::PARAM_STR);
        $req->bindParam(3, $login, PDO::PARAM_STR);
        $req->bindParam(4, $pwd, PDO::PARAM_STR);

        //ETAPE 11 : Exécution de la requête
        $req->execute();
        echo 'etape2';

        //ETAPE 12 : Message de Confirmation
        $messageTask = "Vous avez été enregistré avec succès !";
        return $messageTask;
    } catch (Exception $error) {
        return $error;
    }
}



function modifyUser($name, $firstname, $login)
{
    echo '<br>';
    echo $name;
    echo $firstname;
    echo $login;
    try {
        echo 'etape2';
        //ETAPE 8 : Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //ETAPE 9 : Requête préparée
        $req = $bdd->prepare('UPDATE users SET name_user = ?, first_name_user = ? WHERE login_user = ?');
        echo 'etape2';
        //ETAPe 10 : Binding Param
        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $firstname, PDO::PARAM_STR);
        $req->bindParam(3, $login, PDO::PARAM_STR);
        echo 'etape4';
        //ETAPE 11 : Exécution de la requête
        $req->execute();


        //ETAPE 12 : Message de Confirmation
        $messageAdd = "Vous avez mofifié votre compte !";
        return $messageAdd;
    } catch (Exception $error) {
        echo $error;
        return $error;
    }
}



