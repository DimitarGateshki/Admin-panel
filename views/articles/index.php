<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
</head>
<body>
    <h1>Articles</h1>
    <a href="/auth/logout">Logout</a>
    <a href="/articles/create">Create New Article</a>

    <?php foreach ($sortedArticles as $letter => $articles): ?>
        <h2><?= $letter ?></h2>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <?= htmlspecialchars($article['title']) ?>
                    <a href="/articles/edit/<?= $article['id'] ?>">Edit</a>
                    <a href="/articles/delete/<?= $article['id'] ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</body>
</html>
