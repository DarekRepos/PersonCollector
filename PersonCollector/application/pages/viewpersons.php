<?php
require dirname(__DIR__) . '/views/header.php';
require dirname(__DIR__) . '/views/nav.php';


use PersonCollector\Core\Connection;
use PersonCollector\Core\Users;
use voku\helper\Paginator;


$pdo = Connection::make();

$persons = new Users($pdo);
$pages = new Paginator('10', 'p');
$rows = new Users($pdo);
$allrows = $rows->getAllPersons('persons');
$total = count($allrows);
$pages->set_total($total);
$statement = $persons->selectFromQuery("SELECT id, firstname, lastname, age FROM " . 'persons' . $pages->get_limit());
//TODO: Add pagination
?>
    <main>
        <table>
            <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Actions</th>
            </thead>
            <tbody>
            <?php
            foreach ($statement as $item => $itemvalue) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($itemvalue->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($itemvalue->firstname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($itemvalue->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($itemvalue->age, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="edit/<?php echo htmlspecialchars($itemvalue->id, ENT_QUOTES, 'UTF-8'); ?>"
                           class="edit_btn">Edit</a>
                        <a href="delete/<?php echo htmlspecialchars($itemvalue->id, ENT_QUOTES, 'UTF-8'); ?>"
                           class="delete_btn">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php echo $pages->page_links(); ?>
    </main>
<?php require dirname(__DIR__) . '/views/footer.php'; ?>