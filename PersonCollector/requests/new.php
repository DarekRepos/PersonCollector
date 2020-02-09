<?php
use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);


if (isset($_POST["submit"])) {

    $persons->firstname=htmlspecialchars(strip_tags($_POST['firstname']));
    $persons->lastname=htmlspecialchars(strip_tags($_POST['lastname']));
    $persons->age=htmlspecialchars(strip_tags($_POST['age']));

    $statement = $persons->create('persons');
    $_SESSION['message']="Address saved";
}
