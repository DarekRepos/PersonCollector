<?php

use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);

//TODO: sanitazing and validating id
$statement = $persons->getOnePersonByID('persons', $_GET['id']);

if (isset($_POST["save"])) {
    $persons->id=htmlspecialchars(strip_tags($_GET['id']));
    $persons->firstname=htmlspecialchars(strip_tags($_POST['firstname']));
    $persons->lastname=htmlspecialchars(strip_tags($_POST['lastname']));
    $persons->age=htmlspecialchars(strip_tags($_POST['age']));


    $statementtwo = $persons->update("persons");

    $_SESSION['message']="Address saved";

    $statement = $persons->getOnePersonByID('persons', $persons->id);
}

?>
<form role="form"  method="POST">
    <label for="firstname">Your first name</label>
    <input type="text" id="firstname"  name="firstname" value="<?php echo $statement['firstname']; ?>" ">
    <label for="lastname">Your last names</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo $statement['lastname']; ?>" >
    <label for="age">Your age</label>
    <input type="number" id="age" name="age" value="<?php echo $statement['age']; ?>" "/>
    <input type="submit" name="save" class="btn"/>
</form>
