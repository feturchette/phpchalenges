<?php

namespace src\DatabaseConnectivity;

use PDO;

class ExadsTestModel 
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $statement = $this->pdo->prepare("SELECT name, age, job_title FROM exads_test");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $name, int $age, string $jobTitle)
    {
        $statement = $this->pdo->prepare("INSERT INTO exads_test (name, age, job_title) VALUES (:name, :age, :job_title);");
        $statement->bindParam(":name", $name, PDO::PARAM_STR);
        $statement->bindParam(":age", $age, PDO::PARAM_INT);
        $statement->bindParam(":job_title", $jobTitle, PDO::PARAM_STR);
            
        return $statement->execute();
    }
}
