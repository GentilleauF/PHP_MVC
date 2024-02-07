<?php
session_start();

include './model/modelArticles.php';
include './model/modelCategories.php';
include './utils/getallCategories.php';



//////////////////// GET ALL THE CATEGORIES  //////////////////////
$addCat = new Category;
$dataCategories = $addCat->getAllCategories();
$selectCategory = formatCategories($dataCategories);


//////////////////////// ADD CATEGORY /////////////////////////
if (isset($_POST['submitNewCategory'])) {
    if (
        isset($_POST['new_cat']) and !empty($_POST['new_cat'])
    ) {
        $newCat = htmlentities(strip_tags(stripslashes(trim($_POST['new_cat']))));

        $addCat = new Category;
        $addCat->setName($newCat);
        // APPEL DU MODEL
        $addCat->AddNewCategory();
        $dataCategories = $addCat->getAllCategories();
        $selectCategory = formatCategories($dataCategories);
        
        
    }
}


//////////////////////// ADD ARTICLE /////////////////////////
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

        $newArticleAdd = new Articles();
        $newArticleAdd->setName($articleName);
        $newArticleAdd->setContent($articleContenu);
        $newArticleAdd->setIdCat($id_cat);
        $newArticleAdd->setIdUSer($login);

        //APPEL DU MODEL
        $newArticleAdd->AddArticle();

        var_dump($newArticleAdd);
    }

}




include './controlerNav.php';
include './view/header.php';
include './view/nav.php';
include './view/VueAjoutArticle.php';
