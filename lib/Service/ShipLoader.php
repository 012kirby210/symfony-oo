<?php

class ShipLoader
{

    public function __construct(private ShipStorageInterface $shipStorage)
    {}

    /**
     * @return AbstractShip[]
     */
    public function getShips(): array
    {
        $shipsData = $this->shipStorage->fetchAllShipsData();
        $ships = array();
        foreach($shipsData as $shipData){
            $ship = $this->createShipFromData($shipData);
            $ships[$ship->getId()] = $ship;
        }

        return $ships;
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