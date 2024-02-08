<?php
// Ma classe pour me connecter a ma bdd mySQL. Elle doit implementer l'inreface bddService

//Import de mon interface
// include '../services/BddServices.php';

// Implementer l'interface bdd service, grace a la propriété implements
class bddMySql implements BddService
{   
    private ?string $host;
    private ?string $dbName;
    private ?string $dbLogin;
    private ?string $dbPassword;


    //Constructeur()
    public function __construct($host, $dbName, $dbLogin, $dbPassword){
        $this->host = $host;
        $this->dbName = $dbName;
        $this->dbLogin = $dbLogin;
        $this->dbPassword = $dbPassword;
    }
    
    // GETTER
    public function getHost():string{
        return $this->host;
    }
    public function getdbNBame():string{
        return $this->dbName;
    }

    public function getLogin():string{
        return $this->dbLogin;
    }

    public function getPassword():string{
        return $this->dbPassword;
    }




    //Méthodes
    public function connect(): PDO
    {
        $host = $this->getHost();
        $dbName = $this->getdbNBame();
        $dbLogin = $this->getLogin();
        $dbPassword = $this->getPassword();
        return new PDO("mysql:host=$host;dbname=$dbName", "$dbLogin", "$dbPassword", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
