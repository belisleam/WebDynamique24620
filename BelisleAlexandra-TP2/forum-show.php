<?php
session_start(); // session optionnelle pour lire les articles
require_once('db/connex.php');

if(isset($_GET['id']) && $_GET['id'] != null){
    $id = mysqli_real_escape_string($connex,$_GET['id']);
    $sql = "SELECT forumId, forumTitle, forumArticle, forumUserId, userUsername, forumDate FROM forum INNER JOIN user ON userId = forumUserId WHERE forumId='$id'";
    $result = mysqli_query($connex, $sql);

    if($result && mysqli_num_rows($result) == 1){
        $forum = mysqli_fetch_assoc($result);
    } else {
        header('location:forum-index.php');
        exit;
    }
}else{
    header('location:forum-index.php');
    exit;
}

$mainTitle = "Affichage de l'article";
include_once('header.php');
?>
<p>Publié par <?= htmlspecialchars($forum['userUsername']); ?> le <?= htmlspecialchars($forum['forumDate']); ?></p>
<h1><?= htmlspecialchars($forum['forumTitle']); ?></h1>
<p><?= nl2br(htmlspecialchars($forum['forumArticle'])); ?></p>


<?php if(isset($_SESSION['id']) && $_SESSION['id'] == $forum['forumUserId']): ?>
    <a href="forum-edit.php?id=<?= $forum['forumId']; ?>" class="btn">Modifier</a>
    <form action="forum-delete.php" method="post" style="display:inline">
        <input type="hidden" name="id" value="<?= $forum['forumId']; ?>">
        <input type="submit" value="Supprimer" class="btn-danger">
    </form>
<?php endif; ?>

<?php include_once('footer.php'); ?>