<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        foreach ($data as $article) {
        ?>
        <div class="d-md-flex py-3">
            <div class="flex-shrink-0">
                <img src="https://placehold.co/100x100" alt="" width="100" height="100">
            </div>
            <div class="flex-grow-1 ms-md-3">
                <h3>
                    <a href="/article.php?id=<?php echo $article->id ?>"><?php echo $article->title; ?></a>
                </h3>
                <p class="mb-0"><?php echo $article->content; ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>