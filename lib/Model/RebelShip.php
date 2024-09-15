<?php

class RebelShip extends AbstractShip
{
    public function getFavoriteJedi(): string
    {
        $coolJedis = ['Yoda', 'Ben Kenobi'];
        $key = array_rand($coolJedis);

        return $coolJedis[$key];
    }

    public function getType(): string
    {
        return 'Rebel';
    }

    public function isUnderRepair(): bool
    {
        return false;
    }

    public function getNameAndSpecs(bool $useShortFormat=false)
    {
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= (' (Rebel)');
        return $val;
    }

    public function getJediFactor(): int
    {
        return rand(10,39);
    }
}