<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root . '/facebook/app/Model.php';

class Post extends Model {
    public $id;

    public $title;

    public $content;
    
    public $userId;

    public function __construct(array $data = [], int $id = 0)
    {
        // [] = false, 0 = false, null = false, ..etc
        parent::__construct();

        $this->columns = ['id', 'title', 'content', 'user_id', 'created_at', 'updated_at'];
        
        // fadi@lena.ps, fadi98
        if ($data && !($id = $this->dbInstanse->insertQuery('posts', $data))) {
            throw new Exception('mysql error! please make sure your data is  correct');
        } 
        //it's same to: if($data==true && $id==false) ?????????????
        
        if ($id != 0) {
            $this->fillPostById($id);
        } 
        //id !=0 if insert_query worked 
    }

    public function getPostByKeyColumn($keyColumn, $keyValue)
    {
        if(! in_array($keyColumn, $this->keyColumns)) {
            throw new Exception('you can not get row by none key column');
        }

        $record =  
            $this
                ->dbInstanse
                ->selectByKeyValue('posts', $keyColumn, $keyValue)
                ->fetch_assoc();

        if(! $record) {
            return false;
        }

        return new Post([], $record['id']);
    }
    
    public function fillPostById($id)
    {
        $records = $this->dbInstanse->selectQuery('posts',[], $id);

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

    public function getPosts()
    {
        $posts = [];

        $records = $this->dbInstanse->selectQuery('posts');

        while($record = $records->fetch_assoc())
        {
            $posts[] = new Post([], $record['id']);
        }

        return $posts;
    }

    public function getCreatedAt()
    {
        return date("F jS, Y", strtotime($this->createdAt));
    }
}