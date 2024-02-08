<main class="m-4">
    <p><?php $selectCategory ?></p>

    <h3 class="text-lg font-medium">Ajouter un article</h3>
    <form action="ajoutArticle" method="post">
        <p>Nom de l'article : <input type="text" name="article_name" class="border p-1 rounded-md m-2"></p>
        <p>Contenu de l'article : <input type="text" name="article_contenu" class="border p-1 rounded-md m-2"></p>
        <p>Catégorie :<select name="id_cat" class="border p-1 rounded-md m-2">
                <?= $selectCategory ?>
            </select></p>
        <input type="submit" name="SubmitArticle" class="bg-blue-500 p-1 px-2 text-white rounded m-2">
    </form>
    <p><?php $messageArticle ?></p>
    <p><?php $errorArticle ?></p>




    <h3 class="text-lg font-medium pt-10">Besoin d'une nouvelle Catégorie?</h3>
    <form action="" method="post">
        <input type="text" name="new_cat" placeholder="Votre catégorie" class="border p-1 rounded-md m-2">
        <input type="submit" name="submitNewCategory" class="bg-blue-500 p-1 px-2 text-white rounded m-2">
    </form>
    <p><?php $addCat ?></p>
</main>


</body>

</html>