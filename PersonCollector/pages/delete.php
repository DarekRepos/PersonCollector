<?php


use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);


//TODO: sanitazing and validating id
$statement = $persons->delete('persons', $_GET['id']);

if ($statement) {

$_SESSION['message']="Address deleted";

}
