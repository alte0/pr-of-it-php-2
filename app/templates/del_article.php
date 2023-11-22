<div class="container">
    <h3>Выберите новости для удаления</h3>
    <form action="" method="POST">
        <?php
        foreach ($this->articles as $article) {
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