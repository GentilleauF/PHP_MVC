<?php
session_start();
include './model/modelArticles.php';
////////////////////////////// LISTE DES ARTICLES /////////////////////////////

    $listedArrayArticles = ListArticles();

    ob_start();
    foreach ($listedArrayArticles as $oneArticle) {
        ?>
            <li><?= $oneArticle['nom_task'] ?> : <?= $oneArticle['content_task'] ?>. écrit par <?= $oneArticle['login_user'] ?></li>
        <?php
    }
    $listedArticles = ob_get_clean();




include './controlerNav.php';
include './view/header.php';
include './view/nav.php';
include './view/VueListArticles.php';
