<?php

namespace Model;
class Ship extends AbstractShip
{

    use SettableJediFactorTrait;
    private $underRepair = false;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->underRepair = (70 <= random_int(1, 100));
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
