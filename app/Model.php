<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root . '/facebook/database/Database.php';

class Model {
    protected $columns;
    
    protected $keyColumns = ['id'];
    
    protected $dbInstanse;
    
    protected $createdAt;

    protected $updatedAt;
    
    protected function __construct()
    {
        $this->dbInstanse = new Database();
    }
}