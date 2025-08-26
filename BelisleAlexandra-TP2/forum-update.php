<?php
require_once('check-session.php');
require_once('db/connex.php');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:forum-index.php');
    exit;
}

// Sécuriser les entrées
foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

// Vérifier que l'utilisateur connecté est bien l'auteur
$sqlCheck = "SELECT forumUserId FROM forum WHERE forumId='$id' LIMIT 1";
$resultCheck = mysqli_query($connex, $sqlCheck);

if($resultCheck && mysqli_num_rows($resultCheck) == 1){
    $row = mysqli_fetch_assoc($resultCheck);
    if($row['forumUserId'] != $_SESSION['id']){
        die("Vous n'avez pas l'autorisation de modifier cet article.");
    }
} else {
    die("Article introuvable.");
}

// Mise à jour
$sql = "UPDATE forum SET forumTitle='$title', forumArticle='$article' WHERE forumId='$id'";
if(mysqli_query($connex, $sql)){
    header('location:forum-index.php');
    exit;
} else {
    echo 'Erreur: '.mysqli_error($connex);
}
?>