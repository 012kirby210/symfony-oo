<?php

namespace Model;

use Exception;

abstract class AbstractShip
{
    private $name;
    private $weaponPower = 0;
    private $strength = 0;

    private int $id;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function getJediFactor(): int;
    abstract public function getType(): string;
    abstract public function isUnderRepair(): bool;

    public function getWeaponPower(): int
    {
        return $this->weaponPower;
    }

    public function setWeaponPower(int $weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    public function sayHello()
    {
        echo 'HELLO';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAndSpecs(bool $useShortFormat = false)
    {
        $stringToReturn = '';
        if ($useShortFormat) {
            $stringToReturn = sprintf("%s: %s, %s, %s",
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength);
        } else {
            $stringToReturn = sprintf("%s: w:%s, j:%s, s:%s",
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength);
        }
        return $stringToReturn;
    }

    public function doesGivenShipHaveMoreStrengh($givenShip)
    {
        return $givenShip->strenght > $this->strength;
    }

    public function setStrength($strength)
    {
        if (!is_numeric($strength)) {
            throw new Exception('strength must be numeric');
        }
        $this->strength = $strength;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

//    public function __get(string $property): string
//    {
//        if ( ! property_exists( $this, $property)){
//            throw new Exception('property does not exist');
//        }
//        if ('strength'===$property){
//            return $this->getStrength();
//        }
//
//        return '';
//
//    }

}