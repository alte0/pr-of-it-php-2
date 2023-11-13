<?php

namespace App\Exception;

class ErrorsException extends \Exception
{
    private array $errors = [];

    public function getAll(): array
    {
        return $this->errors;
    }

    public function add(\Exception $exception): void
    {
        $this->errors[] = $exception;
    }

    public function empty(): bool
    {
        return empty($this->errors);
    }
}