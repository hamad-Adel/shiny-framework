<?php
declare(strict_types=1);

namespace Framework\Database;

interface DatabaseConnectionInterface 
{
    public function open();
    public function close();
}