<?php

// Liste les articles de l'utilisateur
if (isset($_SESSION['name'])) {
    //New object
    $myArticles = new Articles;
    $myArrayArticles = $myArticles->getMyArticles($_SESSION['id']);

    $myArticlesTitle = "<h2>Mes Articles</h2>";
    ob_start();
    if (isset($myArrayArticles)) {
        foreach ($myArrayArticles as $oneArticle) {
            ?>
                <li><?= $oneArticle['nom_task'] ?> : <?= $oneArticle['content_task'] ?></li>
            <?php
        }
    }

    $myArticles = ob_get_clean();
}
