<?php

class Category {
    private ?int $id;
    private ?string $name;

    public function getId():string{
        return $this->id;
    }
    public function setId(int $id):Category{
        $this->id = $id;
        return $this; //-> retourne l'objet ModelUser
    }


    public function getName():string{
        return $this->name;
    }
    public function setName(string $name):Category{
        $this->name = $name;
        return $this; //-> retourne l'objet ModelUser
    }




    // METHOD
    public function AddNewCategory():string|Exception{
        try {
            //Connexion à la BDD
            echo 'etape1';
            $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //Requête préparée
            $req = $bdd->prepare('INSERT INTO category (name_cat) VALUES (?)');

            //Binding Param
            $category = $this->name;
            $req->bindParam(1, $category, PDO::PARAM_STR);

            $req->execute();
            echo 'Nouvelle catégorie crée';

            //Message de Confirmation
            $messageArticle = "Vous avez enregistré la catégorie avec succès !";
            return $messageArticle;
        } 
        catch (Exception $errorArticle) 
        {
            return $errorArticle;
        }
    }




    // SELECT ALL CATEGORIES
    public function getAllCategories():array|string{
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

}



