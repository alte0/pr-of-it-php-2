<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($isEdit) && $isEdit ? 'Редактирование новости' : "Новая новость"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3><?php echo isset($isEdit) && $isEdit ? 'Редактирование новости' : "Добавить новую новость"; ?></h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Заголовок новости</label>
            <input
                    type="text"
                    name="article[title]"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Заголовок новости"
                    <?php
                    if (isset($article) && is_object($article)) {
                    ?>value="<?php echo $article->title; ?>"<?php
            }
            ?>
            >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст новости</label>
            <textarea
                    class="form-control"
                    name="article[content]"
                    id="exampleFormControlTextarea1"
                    rows="10"
                    placeholder="Текст новости"
            ><?php
                if (isset($article) && is_object($article)) {
                    echo $article->content;
                }
                ?></textarea>
        </div>
        <div>
            <button class="btn btn-danger"
                    type="submit"><?php echo isset($isEdit) && $isEdit ? 'Изменить' : "Добавить"; ?> новость
            </button>
        </div>
    </form>
</div>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>