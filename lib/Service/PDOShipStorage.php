<?php

namespace Service;
class PDOShipStorage implements ShipStorageInterface
{
    public function __construct(private PDO $pdo)
    {}
    public function fetchAllShipsData()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipsArray;
    }

    public function fetchSingleShipData(int $id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(['id' => $id]);
        $shipData = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipData) {
            return null;
        }

        return $shipData;
    }

    private function getPDO(): PDO
    {
        return $this->pdo;
    }
}