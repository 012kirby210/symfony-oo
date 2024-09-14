<?php

class BattleResult
{
    private bool $usedJediPower;
    private ?Ship $winningShip;
    private ?Ship $loosingShip;

    public function __construct( bool $usedJediPower = false, ?Ship $winningShip = null, ?Ship $loosingShip = null)
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
    public function getWinningShip(): Ship | null
    {
        return $this->winningShip;
    }

    /**
     * @return mixed
     */
    public function getLoosingShip(): Ship | null
    {
        return $this->loosingShip;
    }

    public function isThereAWinner(): bool
    {
        return $this->getWinningShip() !== null;
    }


}