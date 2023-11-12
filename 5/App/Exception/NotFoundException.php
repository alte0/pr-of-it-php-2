<?php

namespace App\Exception;

use Throwable;

class NotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        
        if (empty($message)) {
            $this->message = 'Ошибка 404 - не найдено';
        }
    }
}