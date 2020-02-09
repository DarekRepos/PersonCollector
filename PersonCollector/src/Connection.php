<?php

namespace PersonCollector;

use PDO;
use PDOException;

class Connection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=db;dbname=wordpress', 'user','password');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}