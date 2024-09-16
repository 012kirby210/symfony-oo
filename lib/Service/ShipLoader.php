<?php

namespace Service;
use Model\AbstractShip;
use Model\RebelShip;
use Model\Ship;
use Model\ShipCollection;

class ShipLoader
{
    public function __construct(private ShipStorageInterface $shipStorage)
    {}

    public function getShips(): ShipCollection
    {
        try{
            $shipsData = $this->shipStorage->fetchAllShipsData();
        }catch(\PDOException $e){
            trigger_error($e->getMessage());
            $shipsData = [];
        }

        $ships = array();
        foreach($shipsData as $shipData){
            $ship = $this->createShipFromData($shipData);
            $ships[$ship->getId()] = $ship;
        }

        return new ShipCollection($ships);
    }

    public function findOneById($id): AbstractShip|null
    {
        $shipData = $this->shipStorage->fetchSingleShipData($id);

        if ( ! $shipData ){
            return null;
        }

        return $this->createShipFromData($shipData);
    }

    private function createShipFromData(array $shipData): AbstractShip
    {
        if ($shipData['team'] === 'rebel'){
            $ship = new RebelShip($shipData['name']);
        }else{
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }
        $ship->setStrength($shipData['strength']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setId($shipData['id']);

        return $ship;
    }

}