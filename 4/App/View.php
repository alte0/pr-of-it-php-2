<?php

namespace App;

class View implements \Countable, \Iterator
{
    use \App\SetAndGetDataTrait;

    public function __construct()
    {
    }

    /**
     * @deprecated
     */
    public function display(string $path): void
    {
        require_once $path . '.php';
    }

    public function render(string $path): string|bool
    {
        ob_start();

        require_once $path . '.php';

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function current(): mixed
    {
        return current($this->data);
    }

    public function next(): void
    {
        next($this->data);
    }

    public function key(): int|string|null
    {
        return key($this->data);
    }

    public function valid(): bool
    {
        return key($this->data) !== null;
    }

    public function rewind(): void
    {
        reset($this->data);
    }
}