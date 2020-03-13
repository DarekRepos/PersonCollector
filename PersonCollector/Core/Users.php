<?php


namespace PersonCollector\Core;


use PDO;

class Users
{
    public $id;
    public $firstname;
    public $lastname;
    public $age;

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $PDO)
    {
        $this->pdo = $PDO;
    }

    /**
     * @return mixed
     */
    public function getAllPersons($table)
    {
        $query = "SELECT id, firstname, lastname, age FROM " . $table;

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    //better to use some libs orm and Models from MVC
    public function selectFromQuery($query){

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * @param $table
     * @param $columnName
     * @return array
     */
    public function getAllPersonsOrderedBy($table, $columnName)
    {
        $query =
            "SELECT id, firstname, lastname, age FROM " . $table . " ORDER BY " . $columnName;

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function getOnePersonByID($table, $id)
    {
        $query = "SELECT id, firstname, lastname, age FROM " . $table. " WHERE id = :id LIMIT 0,1";

        $statement = $this->pdo->prepare($query);
        $statement ->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function create($table)
    {
        $query = "INSERT INTO "
        . $table .
        " (firstname, lastname, age) VALUES (:firstname, :lastname, :age)";

        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':firstname', $this->firstname,  PDO::PARAM_STR);
        $statement->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(':age', $this->age, PDO::PARAM_INT);

        $statement->execute();
        return true;
    }
    public function update($table)
    {
        $query = "UPDATE "
            . $table .
            " SET firstname =:firstname, lastname = :lastname, age = :age WHERE id = :id ";

        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
        $statement->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(':age', $this->age, PDO::PARAM_INT);

        $statement->execute();
        return true;
    }
    public function delete($table, $id)
    {
        $query = "DELETE FROM "
            . $table .
            " WHERE id = :id ";

        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();
        return true;
    }
}