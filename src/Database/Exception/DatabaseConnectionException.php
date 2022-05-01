<?php
declare(strict_types = 1);

namespace Framework\Database\Exception;

class DatabaseConnectionException extends \PDOException
{
    protected $message;
    protected $code;

    public function __construct($message = null, $code =null)
    {
        $this->message = $message;
        $this->code = $code;
    }

}