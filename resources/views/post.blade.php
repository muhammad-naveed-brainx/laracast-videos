<!DOCTYPE html>
<html>

<head>
    <title>posts-app laravel</title>
    <link rel="stylesheet" href="/css/app.css">
</head>


<body>
<article>
  <h1> <?= $post->title ?></h1>
    <p> <?= $post->body ?> </p>
    <h2><a href="/">Back</a> </h2>
</article>
</body>
</html>
