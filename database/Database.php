<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root . '/facebook/config/Connection.php';

class Database {

    private $conInstanse;

    public function __construct()
    {
        $this->conInstanse = Connection::init();
    }

    protected function throwTableNameException($tableName)
    {
        if(! $tableName)
        {
            throw new Exception('could not insert new data without table name');
        }

        return true;
    }

    protected function getDateNow()
    {
        return date("Y-m-d H:i:s");
    }

    
    public function insertQuery(string $tableName, array $columns)
    {
        $this->throwTableNameException($tableName);

        $insertQuery = "INSERT INTO `$tableName` "; 
        
        $columnKeys = '(';
        $columnValues = '(';


        foreach($columns as $columnKey => $columnValue)
        {
            if(is_int($columnKey))
            {
                throw new Exception('you can not passing none associated array');
            }

            if($columnKey == 'password')
            {
                $columnValue = md5($columnValue);
            }

            $columnKeys .= "`$columnKey`, ";
            $columnValues .= "'$columnValue', ";
        }

        $dateNow = $this->getDateNow();

        
        $columnKeys .= " `updated_at`, `created_at`) ";
        $columnValues .=  "'$dateNow', '$dateNow');";
       
        $insertQuery .= "$columnKeys VALUES $columnValues";

        $this->conInstanse->query($insertQuery);

        return $this->conInstanse->insert_id;
    }

    public function deleteQuery($tableName, int $id)
    {
        $this->throwTableNameException($tableName);

        $query = "DELETE FROM `$tableName` WHERE `id`=$id;";

        return $this->conInstanse->query($query);
    }

    public function updateQuery(string $tableName, int $id, array $columns)
    {
        $this->throwTableNameException($tableName);

        $updateQuery = "UPDATE `$tableName` SET";

        foreach($columns as $columnKey => $columnValue)
        {
            $updateQuery .= "`$columnKey` = '$columnValue', ";
        }

        $dateNow = $this->getDateNow();

        $updateQuery .=  " `updated_at` = '$dateNow' WHERE `id` = $id;";
        
        return $this->conInstanse->query($updateQuery);
    }

    public function selectQuery(string $tableName, array $columns = [], int $id = 0)
    {
        $this->throwTableNameException($tableName);
        
        $query = "SELECT ";

        if(empty($columns))
        {
            $query .= "* ";
        } else {
            $query .= "`id`, ";

            foreach($columns as $column)
            {
                if($column == 'id' || $column == 'created_at' || $column == 'updated_at')
                {
                    continue;
                }

                $query .= "`$column`, ";
            }

            $query .= "`created_at`, `updated_at` ";
        }

        $query .= " FROM `$tableName`";

        if($id)
        {
            $query .= " WHERE `id` = '$id'";
        }

        return $this->conInstanse->query($query);
    }

    public function selectByKeyValue($tableName, $keyColumn, $keyValue)
    {
        return 
            $this
            ->conInstanse
            ->query(
                "SELECT * FROM `$tableName` WHERE `$keyColumn` = '$keyValue'"
            );
    }
}
