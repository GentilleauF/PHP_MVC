<?php

function AddNewCategory($cat)
{
    try {
        //Connexion à la BDD
        echo 'etape1';
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Requête préparée
        $req = $bdd->prepare('INSERT INTO category (name_cat) VALUES (?)');

        //Binding Param
        $req->bindParam(1, $cat, PDO::PARAM_STR);

        $req->execute();
        echo 'Nouvelle catégorie crée';

        //Message de Confirmation
        $messageArticle = "Vous avez enregistré la catégorie avec succès !";
        return $messageArticle;
    } catch (Exception $errorArticle) {
        return $errorArticle;
    }
}





// SELECT ALL CATEGORIES
function getAllCategories()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $req = $bdd->prepare('SELECT id_cat, name_cat FROM category');
        $req->execute();

        $dataCategories = $req->fetchAll(PDO::FETCH_ASSOC);
        return $dataCategories;
    } 
    
    catch (Exception $error) 
    {
        echo $error;
        $selectCategory = $error->getMessage();
        return $selectCategory;
    }
}
