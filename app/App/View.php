<?php

namespace App;

use Twig\Environment;

class View implements \Countable, \Iterator
{
    use \App\SetAndGetDataTrait;

    protected Environment $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new Environment($loader, [
            //'cache' => __DIR__ . '/../compilation_cache',
            'cache' => false,
            //'debug' => true,
        ]);
    }

    /**
     * @deprecated
     */
    public function display(string $path): void
    {
        require_once $path . '.php';
    }

    /**
     * @deprecated
     */
    public function render(string $path): string|bool
    {
        ob_start();

        require_once $path . '.php';

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function renderTwig(string $templateFileName, string $layoutFile = 'layout.twig'): string|bool
    {
        $layout = $this->twig->load($layoutFile);

        return $this->twig->render($templateFileName, array_merge(['layout' => $layout], $this->data));
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