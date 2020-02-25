<?php

use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);




if (isset($_POST["submit"])) {
    $_POST = array_map('trim', $_POST);


    $error = false;


    $first_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);

    $last_name = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);

    $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);


    if (!isset($first_name) || empty($first_name)) {
        $error = true;
    }

    if (!isset($last_name) || empty($last_name)) {
        $error = true;
    }

    if (!isset($age) || empty($age)) {
        $error = true;
    }

    if (($error === true)) {
        exit('nok');
    }

    $persons->firstname = htmlspecialchars(strip_tags($_POST['firstname']));
    $persons->lastname = htmlspecialchars(strip_tags($_POST['lastname']));
    $persons->age = htmlspecialchars(strip_tags($_POST['age']));

    $statement = $persons->create('persons');

    $_SESSION['message'] = "Address saved";
}


