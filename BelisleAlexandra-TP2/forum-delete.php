<?php
require_once('library/check-session.php');
require_once('db/connex.php');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:forum-index.php');
    exit;
}

$id = mysqli_real_escape_string($connex, $_POST['id']);

// Vérifier que l'utilisateur connecté est bien l'auteur
$sqlCheck = "SELECT forumUserId FROM forum WHERE forumId='$id' LIMIT 1";
$resultCheck = mysqli_query($connex, $sqlCheck);

if($resultCheck && mysqli_num_rows($resultCheck) == 1){
    $row = mysqli_fetch_assoc($resultCheck);
    if($row['forumUserId'] != $_SESSION['id']){
        die("Vous n'avez pas l'autorisation de supprimer cet article.");
    }
} else {
    die("Article introuvable.");
}

// Supprimer l'article
$sql = "DELETE FROM forum WHERE forumId='$id'";
if(mysqli_query($connex, $sql)){
    header('location:forum-index.php');
    exit;
} else {
    echo 'Erreur: '.mysqli_error($connex);
}
?>