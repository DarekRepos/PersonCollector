<?php

namespace PersonCollector\Core;

use PDO;
use PDOException;

class Connection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=db;dbname=personsdb', 'user', 'password');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}