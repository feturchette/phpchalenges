<?php

namespace Tests\DateCalculation;

use PHPUnit\Framework\TestCase;
use src\DatabaseConnectivity\ExadsTestModel;
use PDO;

class ExadsTestModelTest extends TestCase
{
    public function testGetAndInsetDataFromDatabase(): void
    {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=challengedb", "challengeuser", "challengepassword");

        $exadsTestModel = new ExadsTestModel($pdo);
        $resultEmpty = $exadsTestModel->getAll();
        
        $this->assertEquals([], $resultEmpty);
        
        $exadsTestModel->insert('Bruce Wayne', 26, 'Owner of Wayne Enterprises');
        $exadsTestModel->insert('Batman', 26, 'Super Hero');

        $result = $exadsTestModel->getAll();

        $this->assertEquals([
            ['name' => 'Bruce Wayne', 'age' => 26, 'job_title' => 'Owner of Wayne Enterprises'],
            ['name' => 'Batman', 'age' => 26, 'job_title' => 'Super Hero']
        ], $result);

        $this->clearExadsTestTable($pdo);
    }

    protected function clearExadsTestTable(PDO $pdo)
    {
        $statement = $pdo->prepare( "DELETE FROM exads_test WHERE id <> 0;" );
        $statement->execute();
    }
}