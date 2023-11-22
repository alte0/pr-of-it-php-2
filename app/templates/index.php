<div>
    <?php
    foreach ($this->articles as $article) {
        ?>
        <div class="d-md-flex py-3">
            <div class="flex-shrink-0">
                <img src="https://placehold.co/100x100" alt="" width="100" height="100">
            </div>
            <div class="flex-grow-1 ms-md-3">
                <h3>
                    <a href="/news/article/id<?php echo $article->id ?>/"><?php echo $article->title; ?></a>
                    <a href="/edit/article/id<?php echo $article->id ?>/"><i class="bi bi-pencil"></i></a>
                </h3>
                <p><?php echo $article->content; ?></p>
                <p class="mb-0"><strong>Автор:</strong> <?php echo $article->author->fio; ?></p>
            </div>
        </div>
        <?php
    }
    ?>
</div>