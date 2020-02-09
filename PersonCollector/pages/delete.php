<?php


use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);

//var_dump( $_GET['id']);
//TODO: sanitazing and validating id
$statement = $persons->delete('persons', $_GET['id']);

if ($statement) {

$_SESSION['message']="Address deleted";

}
