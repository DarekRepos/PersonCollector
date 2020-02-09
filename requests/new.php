<?php
$_POST = array_map('trim', $_POST);
echo $_POST;


use PersonCollector\Connection;
use PersonCollector\Users;

if(isset($_REQUEST['submit'])) {
    echo 'ghjgfjghjf';


    $pdo = Connection::make();

    $persons = new Users($pdo);


        $persons->firstname = htmlspecialchars(strip_tags($_POST['firstname']));
        $persons->lastname = htmlspecialchars(strip_tags($_POST['lastname']));
        $persons->age = htmlspecialchars(strip_tags($_POST['age']));
        var_dump($persons);

        echo htmlspecialchars(strip_tags($_POST['age']));

        $statement=$persons->create('persons');
        var_dump($statement);
        // header("Location: index.php");
        //exit;

    echo '<br/>ghjgfjghjf';
    echo $_POST['firstname'];
}