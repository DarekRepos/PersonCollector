<?php
include dirname(__DIR__). '/requests/new.php';
?>

<form role="form"  method="POST">
    <label for="firstname">Your first name</label>
    <input type="text" id="firstname"  name="firstname" placeholder="Enter firt name">
    <label for="lastname">Your last names</label>
    <input type="text" id="lastname" name="lastname" placeholder="Enter last name">
    <label for="age">Your age</label>
    <input type="number" id="age" name="age" min="1" max="200" step="1" placeholder="Enter your age"/>
    <input type="submit" name="submit" class="btn"/>
</form>
