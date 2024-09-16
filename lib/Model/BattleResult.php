<?php

namespace Model;

use ArrayAccess;

class BattleResult implements ArrayAccess
{
    private bool $usedJediPower;
    private ?AbstractShip $winningShip;
    private ?AbstractShip $loosingShip;

    public function __construct( bool $usedJediPower = false, ?AbstractShip $winningShip = null, ?AbstractShip $loosingShip = null)
    {
        $this->loosingShip = $loosingShip;
        $this->winningShip = $winningShip;
        $this->usedJediPower = $usedJediPower;
    }

    /**
     * @return mixed
     */
    public function wereJediPowerUsed(): bool
    {
        return $this->usedJediPower;
    }

    /**
     * @return mixed
     */
    public function getWinningShip(): AbstractShip | null
    {
        return $this->winningShip;
    }

    /**
     * @return mixed
     */
    public function getLoosingShip(): AbstractShip | null
    {
        return $this->loosingShip;
    }

    public function isThereAWinner(): bool
    {
        return $this->getWinningShip() !== null;
    }


    public function offsetExists(mixed $offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->$offset;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->offsetExists($offset) && $this->$offset = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        $this->offsetExists($offset) && $this->$offset = null;
    }
}