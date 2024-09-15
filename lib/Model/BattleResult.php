<?php

class BattleResult
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


}