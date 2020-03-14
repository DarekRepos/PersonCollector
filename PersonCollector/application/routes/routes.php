<?php


use Delight\Router\Router;
use PersonCollector\Controllers\PagesController;
use PersonCollector\Core\Connection;
use PersonCollector\Core\User;


$router = new Router();

$router->get('/', function () {
    PagesController::ViewPage('home');
});
$router->get('/add', function () {
    PagesController::ViewPage('add');
});

$router->get('/viewpersons', function () {
    PagesController::ViewPage('viewpersons');
});
$router->get('/edit/:id', function ($id) {
    $_SESSION['edit'] = $id;
    PagesController::ViewPage('edit');
});

$router->post('/updateper', function () {

    $pdo = Connection::make();

    $oneperson = new User($pdo);

    if (isset($_POST["save"])) {
        $_POST = array_map('trim', $_POST);

        $error = false;

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        $first_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);

        $last_name = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);

        $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);

        if (!isset($id) || empty($id)) {
            $error = true;
        }

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

        $oneperson->id = htmlspecialchars(strip_tags($_POST['id']));
        $oneperson->firstname = htmlspecialchars(strip_tags($_POST['firstname']));
        $oneperson->lastname = htmlspecialchars(strip_tags($_POST['lastname']));
        $oneperson->age = htmlspecialchars(strip_tags($_POST['age']));

        if ($statementtwo = $oneperson->update("persons")) {
            Header('Location: /viewpersons');
            exit;
        }

        $_SESSION['message'] = "Address saved";
    }

});

$router->get('/delete/:id', function ($id) {
    $pdo = Connection::make();

    $person = new User($pdo);

    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $statement = $person->delete('persons', $id);

    if ($statement) {
        Header('Location: /viewpersons');
        echo $_SESSION['message'] = "Address deleted";
        unset($_SESSION['message']);

    }
});

$router->post('/newpersona', function () {

    $pdo = Connection::make();

    $person = new User($pdo);


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

        $person->firstname = htmlspecialchars(strip_tags($_POST['firstname']));
        $person->lastname = htmlspecialchars(strip_tags($_POST['lastname']));
        $person->age = htmlspecialchars(strip_tags($_POST['age']));

        if ($statement = $person->create('persons')) {
            Header('Location: /add');
            $_SESSION['message'] = "Address saved";
        };
    };

//TODO:add support 404 page
//TODO:a lot of duplicates need refactor all CODE to MVC or use other idea
////TODO:add validations
});
