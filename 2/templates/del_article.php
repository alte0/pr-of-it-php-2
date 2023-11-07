<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Удаление новостей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3><?php echo isset($isEdit) && $isEdit ? 'Редактирование новости' : "Добавить новую новость"; ?></h3>
    <form action="" method="POST">
        <?php
        foreach ($articles as $article) {
            ?>
            <div class="form-check">
                <input
                        class="form-check-input"
                        type="checkbox"
                        name="articles[]"
                        value="<?php echo $article->id ?>"
                        id="flexCheckDefault_<?php echo $article->id ?>"
                >
                <label
                        class="form-check-label"
                        for="flexCheckDefault_<?php echo $article->id ?>"
                ><?php echo $article->title; ?></label>
            </div>
            <?php
        }
        ?>
        <div>
            <button class="btn btn-danger" type="submit">Удалить выбранные новости</button>
        </div>
    </form>
</div>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>