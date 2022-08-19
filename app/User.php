<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root . '/facebook/app/Model.php';

class User extends Model {
    public $id;

    public $name;

    public $username;

    public $email;

    public $password;
    
    public function __construct(array $data = [], int $id = 0)
    {
        // [] = false, 0 = false, null = false, ..etc
        parent::__construct();

        $this->columns = ['id', 'name', 'email', 'username', 'password', 'created_at', 'updated_at'];
        
        array_push($this->keyColumns, 'email', 'username');

        // fadi@lena.ps, fadi98
        if ($data && !($id = $this->dbInstanse->insertQuery('users', $data))) {
            throw new Exception('mysql error! please make sure your data is  correct');
        } 
        //it's same to: if($data==true && $id==false) ?????????????
        
        if ($id != 0) {
            $this->fillUserById($id);
        } 
        //id !=0 if insert_query worked 
    }

    public function getUserByKeyColumn($keyColumn, $keyValue)
    {
        if(! in_array($keyColumn, $this->keyColumns)) {
            throw new Exception('you can not get row by none key column');
        }

        $record =  
            $this
                ->dbInstanse
                ->selectByKeyValue('users', $keyColumn, $keyValue)
                ->fetch_assoc();

        if(! $record) {
            return false;
        }

        return new User([], $record['id']);
    }
    
    public function fillUserById($id)
    {
        $records = $this->dbInstanse->selectQuery('users',[], $id);

        if($records->num_rows)
        {
            $record = $records->fetch_assoc();
            
            // deleted_at
            foreach($this->columns as $column)
            {
                $customColumn = from_snack_to_camel_case($column);

                $this->$customColumn = $record[$column];
            } //every attribute now have value 
        } else {
            throw new Exception('no user id has id #' . $id);
        }
    } 

    public function getUsers()
    {
        $users = [];

        $records = $this->dbInstanse->selectQuery('users');

        while($record = $records->fetch_assoc())
        {
            $users[] = new User([], $record['id']);
        }

        return $users;
    }
}