<?php
session_start();

include './model/modelArticles.php';
include './model/modelCategories.php';
include './utils/getallCategories.php';



//////////////////// GET ALL THE CATEGORIES  //////////////////////
$dataCategories = getAllCategories();
$selectCategory = formatCategories($dataCategories);


//////////////////////// AJOUT d'une Categorie /////////////////////////
if (isset($_POST['submitNewCategory'])) {
    if (
        isset($_POST['new_cat']) and !empty($_POST['new_cat'])
    ) {
        $newCat = htmlentities(strip_tags(stripslashes(trim($_POST['new_cat']))));
        // APPEL DU MODEL
        $addCat = AddNewCategory($newCat);
        $dataCategories = getAllCategories();
        $selectCategory = formatCategories($dataCategories);
        echo $addCat;
        
    }
}


//////////////////////// AJOUT d'un ARTICLE /////////////////////////
if (isset($_POST['SubmitArticle'])) {
    if (
        isset($_POST['article_name']) and !empty($_POST['article_name'])
        and isset($_POST['article_contenu']) and !empty($_POST['article_contenu'])
        and isset($_POST['id_cat']) and !empty($_POST['id_cat'])
    ) {
        $articleName = htmlentities(strip_tags(stripslashes(trim($_POST['article_name']))));
        $articleContenu = htmlentities(strip_tags(stripslashes(trim($_POST['article_contenu']))));
        $id_cat = htmlentities(strip_tags(stripslashes(trim($_POST['id_cat']))));
    
        $login = intval($_SESSION['id']);

        //APPEL DU MODEL
        $messageArticle = AddArticle($articleName, $articleContenu, $login, $id_cat);
        echo $messageArticle;
    
    }

}




include './controlerNav.php';
include './view/header.php';
include './view/nav.php';
include './view/VueAjoutArticle.php';
