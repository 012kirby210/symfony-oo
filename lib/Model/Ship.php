<?php

class Ship extends AbstractShip
{
    private $jediFactor = 0;
    private $underRepair = false;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->underRepair = (70 <= random_int(1, 100));
    }
    public function getJediFactor(): int
    {
        return $this->jediFactor;
    }

    public function setJediFactor(int $jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    public function isUnderRepair(): bool
    {
        return $this->underRepair;
    }

    public function getType(): string
    {
        return 'Empire';
    }

}
