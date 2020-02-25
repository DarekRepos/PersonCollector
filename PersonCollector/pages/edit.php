<?php

use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);

//TODO: sanitazing and validating id
$statement = $persons->getOnePersonByID('persons', $_GET['id']);

if (isset($_POST["save"])) {
    $persons->id = htmlspecialchars(strip_tags($_GET['id']));
    $persons->firstname = htmlspecialchars(strip_tags($_POST['firstname']));
    $persons->lastname = htmlspecialchars(strip_tags($_POST['lastname']));
    $persons->age = htmlspecialchars(strip_tags($_POST['age']));


    $statementtwo = $persons->update("persons");

    $_SESSION['message'] = "Address saved";

    $statement = $persons->getOnePersonByID('persons', $persons->id);
}

?>
<main>
    <form role="form" method="POST">
        <div class="field-group">
            <label for="firstname" class="label">Your first name</label>
            <input type="text" id="firstname" name="firstname" class="field"
                   value="<?php echo $statement['firstname']; ?>" ">
        </div>
        <div class="field-group">
            <label for="lastname" class="label">Your last names</label>
            <input type="text" id="lastname" name="lastname" class="field"
                   value="<?php echo $statement['lastname']; ?>">
        </div>
        <div class="field-group">
            <label for="age" class="label">Your age</label>
            <input type="number" id="age" name="age" class="field"
                   value="<?php echo $statement['age']; ?>" "/>
        </div>
        <div class="field-group">
            <div class="field">
                <input type="submit" name="save" value="Submit"/>
            </div>
        </div>
    </form>
</main>