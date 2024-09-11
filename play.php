<?php

require_once __DIR__ . '/lib/Ship.php';

function printShipSummary(Ship $someShip)
{
    echo "Shipt name : " . $someShip->getName() ;

        echo "<hr/>";
    echo $someShip->getName();
    echo "<hr/>";
    echo $someShip->getNameAndSpecs(true);
    echo '<br><br><br>';
}

$my_ship = new Ship();
$my_ship->setName("Jedi Starship");
$my_ship->setWeaponPower( 10);
$my_ship->setStrength(60);

printShipSummary($my_ship);

$otherShip = new Ship();
$otherShip->setName("Imperial Shuttle");
$otherShip->setWeaponPower( 5);
$otherShip->setStrength( 50);

printShipSummary($otherShip);

if ($my_ship->doesGivenShipHaveMoreStrengh($otherShip))
{
    echo $otherShip->getName() . ' has more strengh';
}else{
    echo $my_ship->getName() . ' has more strengh';
}