<?php
//ROUTER DU SITE

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {
        //route /projet/test -> ./test.php
    case $path === "/PHP_MVC/TaskAccount/":
    case $path === "/PHP_MVC/TaskAccount/accueil":
        include './controller/controllerAccueil.php';
        break;

    case $path === "/PHP_MVC/TaskAccount/compte":
        include './controller/compte.php';
        break;

    case $path === "/PHP_MVC/TaskAccount/connexion":
        include './controller/connexion.php';
        break;

    case $path === "/PHP_MVC/TaskAccount/ajoutArticle":
        include './controller/ajoutArticleandCat.php';
        break;

    case $path === "/PHP_MVC/TaskAccount/deco":
        include './controller/deco.php';
        break;

    case $path === "/PHP_MVC/TaskAccount/articleList":
        include './controller/articleList.php';
        break;
    
    case $path === "/PHP_MVC/TaskAccount/modifyAccount":
        include './controller/modifyAccount.php';
        break; 
        
    default :
        include './controller/page404.php';

}
