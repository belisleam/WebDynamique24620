<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title><?= $mainTitle; ?></title>
</head>

<body>
<nav>
    <div class="left">
        <div class="logo"><a href="forum-index.php"><img src="img/logo.svg" alt="logo"></a></div>
        <ul class="menu-left">
            <li><a href="forum-index.php">Articles publiés</a></li>
            <li><a href="forum-create.php">Nouvel article</a></li>
        </ul>
    </div>

    <ul class="menu-right">
        <?php if (isset($_SESSION['username'])): ?>
            <li><strong>Bienvenue <?= htmlspecialchars($_SESSION['username']) ?> !</strong></li>
            <li><a href="logout.php" class="btn">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="user-create.php">Créer un compte</a></li>
            <li><a href="login.php" class="btn">Connexion</a></li>
        <?php endif; ?>
    </ul>
</nav>
    <main>