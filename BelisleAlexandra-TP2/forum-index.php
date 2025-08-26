<?php
require_once('db/connex.php');
$sql = "SELECT forumId, forumTitle, forumArticle, userUsername, forumDate FROM forum INNER JOIN user on userId=forumUserId ORDER BY forumDate DESC" ;
$result = mysqli_query($connex, $sql);

$mainTitle = "Articles publiés";
include_once('header.php');
?>

    <h1>Articles publiés</h1>
<div class="card-grid">
    <?php foreach($result as $row){ ?>
        <div class="card">
            <div class="card-meta">
                <span class="card-user"> Par <?= $row['userUsername'] ?></span>
                <span class="card-date">Rédigé le <?= $row['forumDate'] ?></span>
            </div>
            <h2 class="card-title"><?= $row['forumTitle'] ?></h2>
            <p class="card-article"><?= $row['forumArticle'] ?></p>
            
            <a href="forum-show.php?id=<?= $row['forumId'] ?>" class="btn">Aperçu</a>
        </div>
    <?php } ?>
</div>
        
<?php include_once('footer.php');?>