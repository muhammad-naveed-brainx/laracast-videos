<!DOCTYPE html>
<html>

<head>
    <title>posts-app laravel</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>

<?php foreach ($posts as $post): ?>
    <article>
        <?= $post ?>
    </article>
<?php endforeach; ?>
</body>

</html>
