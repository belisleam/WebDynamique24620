<?php
$mainTitle = "Créer un compte";
include_once('header.php');
?>
    <h1>Créer un compte</h1>
        <form action="user-store.php" method="post">
            <label for="name">Nom complet</label>
            <input type="text" name="name" id="name" required>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthday">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" value="S'inscrire" class="btn">
        </form>
<?php include_once('footer.php');?>