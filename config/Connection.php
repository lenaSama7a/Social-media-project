<?php

class Connection {

    private static $dbInstance = null;

    public static function init()
    {
        if(! self::getDbInstanse())
        {
            self::$dbInstance = new mysqli('localhost', 'root', '', "facebook");
        }
        
        return self::getDbInstanse();
    }
//if(! self::getDbInstanse()) == is dbinstance not exist yet .. creat it 
//return self::getDbInstanse() == if it's exists previously or not: return it 

    public static function getDbInstanse()
    {
        return self::$dbInstance;
    }
}