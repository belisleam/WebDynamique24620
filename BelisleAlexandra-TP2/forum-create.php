<?php
require_once('library/check-session.php');
require_once("db/connex.php");

$sql = "SELECT forumId, forumTitle, forumArticle, userUsername, forumDate FROM forum INNER JOIN user on userId=forumUserId";
$result = mysqli_query($connex, $sql);

$mainTitle = "Publier un article";
include_once('header.php');
?>

    <h1>Nouvel article</h1>
        <form action="forum-store.php" method="post">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" required>
            <label for="article">Article</label>
            <textarea name="article" id="article" rows="25" required></textarea>
            <!-- Champ utilisateur caché -->
            <input type="hidden" name="userId" value="<?= $_SESSION['id']; ?>">
            <input type="submit" value="Publier" class="btn">
        </form>
        
<?php include_once('footer.php');?>