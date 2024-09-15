<?php

require_once __DIR__ . '/lib/Model/AbstractShip.php';
require_once __DIR__ . '/lib/Model/Ship.php';
require_once __DIR__ . '/lib/Model/RebelShip.php';
require_once __DIR__ . '/lib/Model/BrokenShp.php';
//require_once __DIR__ . '/lib/Service/BattleManager.php';
require_once __DIR__ . '/lib/Service/ShipStorageInterface.php';
require_once __DIR__ . '/lib/Service/JsonFileShipStorage.php';
require_once __DIR__ . '/lib/Service/PDOShipStorage.php';
require_once __DIR__ . '/lib/Service/ShipLoader.php';
require_once __DIR__ . '/lib/Model/BattleResult.php';
require_once __DIR__ . '/lib/Service/Container.php';


spl_autoload_register(function ($className){
    $path = __DIR__ . '/lib/'.str_replace('\\','/', $className).'.php';
    if (file_exists($path)) {
        require_once $path;
    }
   return ;
});

$configuration = [
    'db_dsn' => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_password' => ''
];