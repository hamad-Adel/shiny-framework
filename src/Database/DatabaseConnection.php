<?php

declare(strict_types = 1);

namespace Framework\Database;

use Framework\Database\Exception\DatabaseConnectionException;
use PDO;


class DatabaseConnection implements DatabaseConnectionInterface
{
    protected PDO $dbh;

    protected array $credentials;


    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @inheritDoc
     */

     public function open()
     {
         try {
            $this->dbh = new PDO(
                $this->credentials['dsn'],
                $this->credentials['username'],
                $this->credentials['password'],
                [
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
                );
         }catch(\PDOException $e)
         {
            throw new DatabaseConnectionException($e->getMessage(), $e->getCode());
         }
     }

     /**
      * @inheritDoc
      */
     public function close()
     {
         $this->dbh = null;
     }
}