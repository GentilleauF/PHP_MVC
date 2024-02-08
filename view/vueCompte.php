
    <main class="p-3">
        <h1 class="text-lg font-medium">Mon Pseudo: <?= $login ?></h1>
        <p>Nom : <?= $_SESSION['name'] ?></p>
        <p>Prénom : <?= $_SESSION['firstname']?></p>

        <br><br>
        <h3 class="text-lg font-medium">Modifier vos informations de compte??</h3>
        <form action="compte" method="post">
           <p>Votre nouveau Nom : <input type="text" name="newName" value="<?= $_SESSION['name'] ?>" class="border p-1 rounded-md m-2"></p> 
           <p>Votre nouveau Prénom : <input type="text" name="newFirstname" value="<?= $_SESSION['firstname']  ?>" class="border p-1 rounded-md m-2"></p>
           <input type="submit" name="SubmitModifyUser" class="bg-blue-500 p-1 px-2 text-white rounded"> 
        </form>
    </main>

    
</body>
</html>