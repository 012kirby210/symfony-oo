<?php

namespace Model;

use Model\AbstractShip;

class BountyHunterShip extends AbstractShip
{

    use SettableJediFactorTrait;
    public function getType(): string
    {
        return 'Bounty Hunter';
    }

    public function isUnderRepair(): bool
    {
        return false;
    }

}