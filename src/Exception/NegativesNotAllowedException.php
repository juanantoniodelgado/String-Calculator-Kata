<?php

declare(strict_types=1);

namespace App\Exception;

use \Exception;
use Throwable;

class NegativesNotAllowedException extends Exception
{
    private const ERROR_MESSAGE = 'Method doesn\'t allow negative numbers. Errors: ';

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::ERROR_MESSAGE . $message, $code, $previous);
    }
}