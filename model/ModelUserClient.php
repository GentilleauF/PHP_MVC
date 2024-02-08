<?php
// Ici la classe UserCLient hérite de ModelUser
// Du fait de l'héritage, un objet instancié par UserClient posséde les tyupages suivant : 
// -object
// -UserClient
// -ModelUser

include 'modelUser.php';

class UserClient extends ModelUSer {
    public function deleteOwnUser():string{
        return "";
    }
}