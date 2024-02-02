<?php

function AddArticle($name, $contenu, $login, $id_cat)
{
    try {
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Requête préparée
        $req = $bdd->prepare('INSERT INTO task (nom_task, content_task, id_user, id_cat) VALUES (?,?,?,?)');

        //Binding Param
        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $contenu, PDO::PARAM_STR);
        $req->bindParam(3, $login, PDO::PARAM_STR);
        $req->bindParam(4, $id_cat, PDO::PARAM_STR);

        //Exécution de la requête
        $req->execute();

        //Message de Confirmation
        $messageArticle = "Vous avez enregistré l'article avec succès !";
        return $messageArticle;
    } catch (Exception $errorArticle) {
        return $errorArticle;
    }
}



function ListArticles()
{
    try {
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare(
            'SELECT id_task, nom_task, content_task, users.login_user FROM task
             LEFT JOIN users 
             ON task.id_user = users.id_user            
            '
        );

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();

        //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (Exception $error) {
        return $error;
    }
}



function myArticles($id)
{
    try {
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare(
            'SELECT id_task, nom_task, content_task, id_user FROM task
            WHERE id_user = ?
            '
        );

        $req->bindParam(1, $id, PDO::PARAM_STR);

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();

        //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (Exception $error) {
        return $error;
    }
}


