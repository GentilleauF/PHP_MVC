<?php
class Articles{
    private ?int $id;
    private ?string $name;
    private ?string $content;
    private ?string $idUser;
    private ?string $idCat;

//GETTER AND SETTER
    public function getContent():string{
        return $this->content;
    }
    public function setContent(string $content):Articles{
        $this->content = $content;
        return $this; //-> retourne l'objet ModelUser
    }
    
    //idUser
    public function getIdUser():string{
        return $this->idUser;
    }
    public function setIdUSer(string $idUser):Articles{
        $this->idUser = $idUser;
        return $this; //-> retourne l'objet ModelUser
    }
    
        
    //IDCAT
    public function getIdCat():string{
        return $this->idCat;
    }
    public function setIdCat(string $idCat):Articles{
        $this->idCat = $idCat;
        return $this; //-> retourne l'objet ModelUser
    }
        
        //NAME
    public function getName():string{
        return $this->name;
    }
    public function setName(string $name):Articles{
        $this->name = $name;
        return $this; //-> retourne l'objet ModelUser
    }



    public function AddArticle() //$name, $contenu, $login, $id_cat
    {
        try {
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //Requête préparée
            $req = $bdd->prepare('INSERT INTO task (nom_task, content_task, id_user, id_cat) VALUES (?,?,?,?)');

            //Binding Param
            $name = $this->name;
            $content = $this->content;
            $idUser = $this->idUser; 
            $idCat = $this->idCat;

            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $content, PDO::PARAM_STR);
            $req->bindParam(3, $idUser, PDO::PARAM_STR);
            $req->bindParam(4, $idCat, PDO::PARAM_STR);

            //Exécution de la requête
            $req->execute();

            //Message de Confirmation
            $messageArticle = "Vous avez enregistré l'article avec succès !";
            return $messageArticle;
        } catch (Exception $errorArticle) {
            return $errorArticle;
        }
    }



    public function ListArticles():array|Exception{
    try {
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare(
            'SELECT id_task, nom_task, content_task, users.login_user FROM task
             LEFT JOIN users 
             ON task.id_user = users.id_user            
            ');

        // Exécution de la requête
        $req->execute();

        // Récupérer la réponse de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (Exception $error) {
        return $error;
    }
}



    public function getMyArticles($id)
    {
        try {
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //Préparation de la requête
            $req = $bdd->prepare(
                'SELECT id_task, nom_task, content_task, id_user FROM task
                WHERE id_user = ?
                ');

            $req->bindParam(1, $id, PDO::PARAM_STR);

            //Exécution de la requête
            $req->execute();

            //Récupérer la réponse de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (Exception $error) {
            return $error;
        }
    }

}





