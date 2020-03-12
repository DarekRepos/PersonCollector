<?php
require dirname(__DIR__).'/views/header.php';
require dirname(__DIR__).'/views/nav.php';
?>
<main>
    <form method="POST" action="/newpersona" >
        <div class="field-group">
            <label class="label" for="firstname">Your first name</label>
            <input class="field" type="text" id="firstname" name="firstname" placeholder="Enter firt name">
        </div>
        <div class="field-group">
            <label class="label" for="lastname">Your last names</label>
            <input class="field" type="text" id="lastname" name="lastname" placeholder="Enter last name">
        </div>
        <div class="field-group">
            <label class="label" for="age">Your age</label>
            <input class="field" type="number" id="age" name="age" min="1" max="200" step="1"
                   placeholder="Enter your age"/>
        </div>
        <div class="field-group">
            <div class="field">
                <input type="submit" name="submit" class="btn" value="Submit"/>
            </div>
        </div>
    </form>
</main>
<?php require dirname(__DIR__).'/views/footer.php'; ?>