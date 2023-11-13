<div class="container">
    <h3><?php echo $this->h3; ?></h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Заголовок новости</label>
            <input
                    type="text"
                    name="article[title]"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Заголовок новости"
                    value="<?php echo $this->title; ?>"
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
            ><?php echo $this->content; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Автор новости</label>
            <select name="article[author]" class="form-select" id="exampleFormControlSelect1">
                <?php foreach ($this->autors as $author) { ?>
                    <option
                            value="<?php echo $author->id; ?>"
                        <?php if (isset($this->author_id) && $this->author_id > 0 && $this->author_id == $author->id) { ?>
                            selected
                        <?php } ?>
                    ><?php echo $author->fio; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button
                    class="btn btn-danger"
                    type="submit"
            >
                <?php echo $this->textSubmit; ?>
            </button>
        </div>
    </form>
</div>