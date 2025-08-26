<?php
session_start();
require_once('db/connex.php');

// Sécuriser les entrées
foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

// Vérifier si l'utilisateur existe
$sql = "SELECT * FROM user WHERE userUsername = '$username'";
$result = mysqli_query($connex, $sql);

if(mysqli_num_rows($result) == 1){
    $user = mysqli_fetch_assoc($result);
    $dbPassword = $user['userPassword'];

    // Vérifier mot de passe
    if (password_verify($password, $dbPassword) || $password === $dbPassword) {
        
        // Hash mot de passe
        if ($password === $dbPassword) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $update = "UPDATE user SET userPassword = '$newHash' WHERE userId = '".$user['userId']."'";
            mysqli_query($connex, $update);
        }

        // Créer la session si la connexion est ok 
        session_regenerate_id();
        $_SESSION['fingerPrint'] = md5($_SERVER["HTTP_USER_AGENT"].$_SERVER["REMOTE_ADDR"]);
        $_SESSION['id'] = $user['userId'];
        $_SESSION['username'] = $user['userUsername'];

        header('location:forum-create.php');
        exit;
    } else {
        // Si mauvais mot de passe
        header('location:login.php?msg=2');
        exit;
    }
} else {
    // Si utilisateur introuvable
    header('location:login.php?msg=1');
    exit;
}
?>