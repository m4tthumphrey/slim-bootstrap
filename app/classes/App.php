<?php

use Cabinet\DBAL\Connection;

class App extends \Slim\Slim
{
    protected $db = null;

    public function setDB(Connection $db)
    {
        $this->db = $db;

        return $this;
    }
    
    public function getDB()
    {
        return $this->db;
    }
}
