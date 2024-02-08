<?php
//MODEL : Gérer les Datas et l'Accès à la BDD
// include './utils/bddMySQL.php';

class ModelUSer {
    private ?int $id;
    private ?string $name;
    private ?string $firstname;
    private ?string $login;
    private ?string $password;
    private ?BddService $bdd; 


//GETTER AND SETTER
    public function getLogin():string{
        return $this->login;
    }
    public function setLogin(string $login):ModelUser{
        $this->login = $login;
        return $this; //-> retourne l'objet ModelUser
    }
    //NAME
    public function getName():string{
        return $this->name;
    }
    public function setName(string $name):ModelUser{
        $this->name = $name;
        return $this; //-> retourne l'objet ModelUser
    }

    //FIRSTNAME
    public function getFirstname():string{
        return $this->firstname;
    }
    public function setFirstname(string $firstname):ModelUser{
        $this->firstname = $firstname;
        return $this; //-> retourne l'objet ModelUser
    }

    //PASSSWORD
    public function getPwd():string{
        return $this->password;
    }
    public function setPwd(string $password):ModelUser{
        $this->password = $password;
        return $this; //-> retourne l'objet ModelUser
    }

    public function getBdd():BddService{
        return $this->bdd;
    }

    public function setBdd(BddService $bdd):ModelUser{
        $this->bdd = $bdd;
        return $this; //-> retourne l'objet ModelUser
    }




    //METHODS
   public function loginUser():array|Exception{
        try {
            //Connexion à la BDD
            // $bdd = new PDO('mysql:host=localhost;dbname=tasks', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            // On remplace donc la ligne précedante par la POO
            $bdd = $this->getBdd()->connect();
            //Préparation de la requête
            $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');
            //Binding de Paramètre et execution
            $login = $this->login;
            $req->bindParam(1, $login, PDO::PARAM_STR);
            $req->execute();

            //Récupérer la réponse de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            }
        catch (Exception $error) {
                return $error;
            }
    } 



    public function AddnewUser():string|Exception
    {
        try {
            //Connexion à la BDD
            $bdd = $this->getBdd()->connect();

            //Requête préparée
            $req = $bdd->prepare('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');
    
            //Binding Param
            $name = $this->name;
            $firstname = $this->firstname;
            $login = $this->login;
            $pwd = $this->password;

            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $login, PDO::PARAM_STR);
            $req->bindParam(4, $pwd, PDO::PARAM_STR);
    
            //Exécution de la requête
            $req->execute();
    
            //Message de Confirmation
            $messageTask = "Vous avez été enregistré avec succès !";
            echo $messageTask;
            return $messageTask;
        } 
        catch (Exception $error) {
            return $error;
        }
    }



    
    public function modifyUser():string|Exception
    {
        try {
            echo 'etape2';
            //Connexion à la BDD
            $bdd = $this->getBdd()->connect();

            //Requête préparée
            $req = $bdd->prepare('UPDATE users SET name_user = ?, first_name_user = ? WHERE login_user = ?');
            echo 'etape2';
            //Binding Param
            $name = $this->name;
            $firstname = $this->firstname;
            $login = $this->login;

            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $login, PDO::PARAM_STR);
            echo 'etape4';
            //ETAPE 11 : Exécution de la requête
            $req->execute();


            //Message de Confirmation
            $messageAdd = "Vous avez mofifié votre compte !";
            return $messageAdd;
        } catch (Exception $error) {
            echo $error;
            return $error;
        }
    }



}













