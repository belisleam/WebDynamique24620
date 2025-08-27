<?php
require_once('library/check-session.php');
require_once('db/connex.php');

if (!isset($_GET['id']) || $_GET['id'] == null) {
    header('location: forum-index.php');
    exit;
}

$id = mysqli_real_escape_string($connex, $_GET['id']);

// Récupérer l'article avec l'auteur
$sql = "SELECT forumId, forumTitle, forumArticle, forumUserId FROM forum WHERE forumId='$id'";
$result = mysqli_query($connex, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $forum = mysqli_fetch_assoc($result);

    // Vérifier que l'utilisateur connecté est bien l'auteur
    if ($forum['forumUserId'] != $_SESSION['id']) {
        die("Vous n'avez pas l'autorisation de modifier cet article.");
    }

    // Préparer les valeurs pour le formulaire
    $title = $forum['forumTitle'];
    $article = $forum['forumArticle'];
} else {
    header('location: forum-index.php');
    exit;
}

$mainTitle = "Modifier l'article";
include_once('header.php');
?>

<h1>Modifier l'article</h1>
<form action="forum-update.php" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">

    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($title); ?>" required>

    <label for="article">Article</label>
    <textarea name="article" id="article" rows="30" required><?= htmlspecialchars($article); ?></textarea>

    <input type="submit" value="Enregistrer" class="btn">
</form>

<?php include_once('footer.php'); ?>