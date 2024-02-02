<?php

// Liste les articles de l'utilisateur
if (isset($_SESSION['name'])) {
    $myArrayArticles = myArticles($_SESSION['id']);
    $mesArticles = "<h2>Mes Articles</h2>";
    ob_start();
    if (count($myArrayArticles) > 0) {
        foreach ($myArrayArticles as $oneArticle) {
            ?>
                <li><?= $oneArticle['nom_task'] ?> : <?= $oneArticle['content_task'] ?></li>
            <?php
        }
    }

    $myArticles = ob_get_clean();
}
