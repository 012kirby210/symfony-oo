<?php

class Ship
{
    private $name;
    private $weaponPower = 0;
    private $jediFactor = 0;
    private $strength = 0;

    private $underRepair = false;

    public  function __construct($name)
    {
        $this->underRepair = (50 <= random_int(1,100));
        $this->name = $name;
    }

    public function getWeaponPower(): int
    {
        return $this->weaponPower;
    }

    public function setWeaponPower(int $weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    public function getJediFactor(): int
    {
        return $this->jediFactor;
    }

    public function setJediFactor(int $jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    public function sayHello()
    {
        echo 'HELLO';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAndSpecs(bool $useShortFormat=false)
    {
        $stringToReturn = '';
        if ($useShortFormat) {
            $stringToReturn =  sprintf("%s: %s, %s, %s",
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength);
        }else{
            $stringToReturn =  sprintf("%s: w:%s, j:%s, s:%s",
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
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
        if ( ! is_numeric($strength)){
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

    public function isUnderRepair(): bool
    {
        return $this->underRepair;
    }

}
