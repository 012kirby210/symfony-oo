<?php

namespace Service;

class LoggableShipStorage implements ShipStorageInterface
{
    public function __construct(private ShipStorageInterface $shipStorage)
    {}

    public function fetchAllShipsData()
    {
        $ships =  $this->shipStorage->fetchAllShipsData();

        $this->log(sprintf("Just fetched %s ships ", count($ships)));

        return $ships;
    }

    public function fetchSingleShipData(int $id)
    {
        return $this->shipStorage->fetchSingleShipData($id);
    }

    private function log(string $message)
    {
        echo $message;
    }
}