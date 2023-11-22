<div class="container">
    <div class="d-md-flex py-3">
        <div class="flex-shrink-0">
            <img src="https://placehold.co/100x100" alt="" width="100" height="100">
        </div>
        <div class="flex-grow-1 ms-md-3">
            <h3><?php echo $this->article->title; ?></h3>
            <p><?php echo $this->article->content; ?></p>
            <p class="mb-0"><strong>Автор:</strong> <?php echo $this->article->author->fio; ?></p>
        </div>
    </div>
</div>