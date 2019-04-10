<?php
/**
 * User: TOLK  Date: 07.04.19
 */

namespace App\Zcore;

use \PDO;

class DB
{
    protected $pdo = null;
    private $stmt = null;
    private $dbHost = 'mysql.zzz.com.ua';
    private $dbName = 'tolk';
    private $dbUser = 'beejee7';
    private $dbPassword = 'beejee7Apr';

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->dbHost};dbname={$this->dbName};charset=utf8",
                $this->dbUser, $this->dbPassword, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    function select($sql, $cond = null)
    {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }

    function selectOne($sql, $cond = null)
    {
        //$result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetch(PDO::FETCH_LAZY);
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }

}