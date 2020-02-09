<?php


use PersonCollector\Connection;
use PersonCollector\Users;

$pdo = Connection::make();

$persons = new Users($pdo);
$statement = $persons->getAllPersons('persons');
//TODO: ilter and validation
//TODO: escaping
//var_dump($statement);
?>
<table>
    <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    </thead>
    <tbody>
    <?php
    foreach ($statement as $item => $itemvalue) {
        ?>
        <tr>
            <td><?php echo $itemvalue->id; ?></td>
            <td><?php echo $itemvalue->firstname; ?></td>
            <td><?php echo $itemvalue->lastname; ?></td>
            <td><?php echo $itemvalue->age; ?></td>
            <td>
                <a href="edit?id=<?php echo $itemvalue->id; ?>" class="edit_btn">Edit</a>
            </td>
            <td>
                <a href="delete?id=<?php echo $itemvalue->id; ?>" class="delete_btn">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
