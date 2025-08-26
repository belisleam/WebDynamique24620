<?php
require_once('db/connex.php');

// Sécuriser les entrées
foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($connex, $value);
}

// Insérer dans forum avec forumUserId
$sql = "INSERT INTO forum (forumTitle, forumArticle, forumDate, forumUserId) 
        VALUES ('$title', '$article', NOW(), '$userId')";

if (mysqli_query($connex, $sql)) {
    header('location:forum-index.php');
    exit;
} else {
    echo "ERROR " . mysqli_error($connex);
}
?>