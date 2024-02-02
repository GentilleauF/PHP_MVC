<main>
    <p><?php $selectCategory ?></p>

    <h3>Ajouter un article</h3>
    <form action="ajoutArticleandCat.php" method="post">
        <p>Nom de l'article : <input type="text" name="article_name"></p>
        <p>Contenu de l'article : <input type="text" name="article_contenu"></p>
        <p>Catégorie :<select name="id_cat">
                <?= $selectCategory ?>
            </select></p>
        <input type="submit" name="SubmitArticle">
    </form>
    <p><?php $messageArticle ?></p>
    <p><?php $errorArticle ?></p>




    <h3>Besoin d'une nouvelle Catégorie?</h3>
    <form action="" method="post" >
        <input type="text" name="new_cat" placeholder="Votre catégorie">
        <input type="submit" name="submitNewCategory">
    </form>
    <p><?php $addCat ?></p>
</main>


</body>

</html>
