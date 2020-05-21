<?php

namespace src\ABTesting;

use PDO;

class PromotionsModel 
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectDesign(): string
    {
        $designs = $this->getAllDesigns();
        $random = $this->getRandomNumber();

        $sum = 0;
        foreach ($designs as $design) {
            $sum += $design['split_percent'];
            if ($sum >= $random) {
                return $design['design_name'];
            }
        }
    }

    protected function getRandomNumber(): int
    {
        return mt_rand(1, 100);
    }

    private function getAllDesigns(): array
    {
        $statement = $this->pdo->prepare("SELECT design_id, design_name, split_percent FROM exads_design_test");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
