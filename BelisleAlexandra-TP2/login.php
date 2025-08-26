<?php
$msg = null;
if(isset($_GET['msg']) && $_GET['msg'] == 1){
    $msg = "Veuillez entrer un compte valide";
}elseif(isset($_GET['msg']) && $_GET['msg'] == 2){
    $msg = "Veuillez entrer un compte valide";
}
?>
<?php
$mainTitle = "Connexion";
include_once('header.php');
?>
    <h1>Connexion</h1>
        <form action="auth.php" method="post">
            <?= "<span class='text-danger'>".$msg."</span>"; ?>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Se connecter" class="btn">
        </form>
<?php include_once('footer.php');?>