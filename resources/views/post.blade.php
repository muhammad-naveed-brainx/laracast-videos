<!DOCTYPE html>
<html>

<head>
    <title>posts-app laravel</title>
    <link rel="stylesheet" href="/css/app.css">
</head>


<body>
<article>
  <h1> {{$post->title}}  </h1>
    <p> {!! $post->body !!} </p>
</article>
<a href="/">Back</a>
</body>
</html>
