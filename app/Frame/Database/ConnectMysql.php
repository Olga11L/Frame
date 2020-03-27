<?php 
namespace Frame\Database;

use Frame\GenericSingleton;

class ConnectMysql extends GenericSingleton{
    private $pdo;
    public function __construct()
    {
        $config = include dirname(__DIR__, 2).'/config.php';
        try {

            $this->pdo = new \PDO($config['mysql']['dsn'], $config['mysql']['username'], $config['mysql']['password']);
        }
        catch(\PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function getPDO()
    {
        return $this->pdo;
    }
 
}