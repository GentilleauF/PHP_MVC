<?php
session_start();
include './model/modelArticles.php';
////////////////////////////// LISTE DES ARTICLES /////////////////////////////

    //NEW OBJECT
    $listedArticles = new Articles;
    $listedArrayArticles = $listedArticles->ListArticles();

    ob_start();
    foreach ($listedArrayArticles as $key=>$oneArticle) {
        ?>
        <div class="flex flex-row border mx-5 my-4 rounded">
            <div class="w-16 flex justify-center items-center bg-blue-300">
                <?= $key+1 ?>
            </div>
            <div class="p-3">
                <p class="font-medium"><?= $oneArticle['nom_task'] ?></p>
                <p><?= $oneArticle['content_task'] ?></p>
                <p>écrit par <?= $oneArticle['login_user'] ?></p>
            </div>
        </div>
        <?php
    }
    $listedArticles = ob_get_clean();




include './controller/controlerNav.php';
include './view/header.php';
include './view/nav.php';
include './view/VueListArticles.php';
