<?php

use PersonCollector\Core\Connection;
use PersonCollector\Core\User;

require dirname(__DIR__).'/views/header.php';
require dirname(__DIR__).'/views/nav.php';
$pdo = Connection::make();

$persons = new User($pdo);
$id = filter_var($_SESSION['edit'], FILTER_SANITIZE_NUMBER_INT);

if (!isset($id ) || empty($id)) {
    exit();
}

unset($_SESSION['message']);

$statement = $persons->getOnePersonByID('persons', $id);

?>
<main>
    <form method="POST" action="/updateper">
        <input type="hidden" name="id"
               value="<?php echo htmlspecialchars($statement['id'], ENT_QUOTES, 'UTF-8');?>">
        <div class="field-group">
            <label for="firstname" class="label">Your first name</label>
            <input type="text" id="firstname" name="firstname" class="field"
                   value="<?php echo htmlspecialchars($statement['firstname'], ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="field-group">
            <label for="lastname" class="label">Your last names</label>
            <input type="text" id="lastname" name="lastname" class="field"
                   value="<?php echo htmlspecialchars( $statement['lastname'], ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="field-group">
            <label for="age" class="label">Your age</label>
            <input type="number" id="age" name="age" class="field"
                   value="<?php echo htmlspecialchars($statement['age'], ENT_QUOTES, 'UTF-8'); ?>"/>
        </div>
        <div class="field-group">
            <div class="field">
                <input type="submit" name="save" value="Submit"/>
            </div>
        </div>
    </form>
</main>
<?php require dirname(__DIR__).'/views/footer.php';
//:TODO view are not separated with the code nedd refactoring to MVC
?>

