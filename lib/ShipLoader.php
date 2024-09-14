<?php

class ShipLoader
{

    public function __construct(private PDO $pdo)
    {}

    /**
     * @return Ship[]
     */
    public function getShips(): array
    {
        $shipsData = $this->queryForShips();
        $ships = array();
        foreach($shipsData as $shipData){
            $ship = $this->createShipFromData($shipData);
            $ships[$ship->getId()] = $ship;
        }

        return $ships;
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipsArray;
    }

    public function findOneById($id): Ship|null
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(['id' => $id]);
        $shipData = $statement->fetch(PDO::FETCH_ASSOC);

        if ( ! $shipData ){
            return null;
        }

        return $this->createShipFromData($shipData);

    }

    private function createShipFromData(array $shipData): Ship
    {
        $ship = new Ship($shipData['name']);
        $ship->setStrength($shipData['strength']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setId($shipData['id']);

        return $ship;
    }

    private function getPDO(): PDO
    {
//        if (!$this->pdo){
//            $this->pdo = new PDO($this->dbDSN, $this->dbUser, $this->dbPassword);
//            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        }

        return $this->pdo;
    }
}