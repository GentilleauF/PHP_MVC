
    <main>
        <h1><?= $login ?></h1>
        <p>Nom : <?= $_SESSION['name'] ?></p>
        <p>Prénom : <?= $_SESSION['firstname']?></p>

        <br><br>
        <h3>Modifier vos informations de compte??</h3>
        <form action="myAccount.php" method="post">
           <p>Votre nouveau Nom : <input type="text" name="newName" value="<?= $_SESSION['name'] ?>"></p> 
           <p>Votre nouveau Prénom : <input type="text" name="newFirstname" value="<?= $_SESSION['firstname'] ?>"></p>
           <input type="submit" name="SubmitModifyUser"> 
        </form>
    </main>

    
</body>
</html>