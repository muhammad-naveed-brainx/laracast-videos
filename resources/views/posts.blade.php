<!DOCTYPE html>
<html>

<head>
    <title>posts-app laravel</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>

<?php foreach ($posts as $post): ?>
    <article>
      <h1> <a href="posts/<?= $post->slug; ?>"> <?= $post->title;?> </a></h1>
        <p><?= $post->excerpt; ?></p>
    </article>
<?php endforeach; ?>
</body>

</html>
