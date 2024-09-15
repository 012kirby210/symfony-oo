<?php

class BrokenShp extends AbstractShip
{

    public function getJediFactor(): int
    {
        return 0;
    }

    public function getType(): string
    {
        return 'Broken';
    }

    public function isUnderRepair(): bool
    {
        return true;
    }
}