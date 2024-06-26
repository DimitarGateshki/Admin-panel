<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>
<body>
    <h1>Edit Article</h1>
    <form action="/articles/edit/<?= $article['id'] ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($article['title']) ?>" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required><?= htmlspecialchars($article['content']) ?></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
