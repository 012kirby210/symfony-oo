<?php

namespace Model;

trait SettableJediFactorTrait
{

    private int $jediFactor = 0;
    public function getJediFactor(): int
    {
        return $this->jediFactor;
    }

    /**
     * @param mixed $jediFactor
     */
    public function setJediFactor(int $jediFactor): void
    {
        $this->jediFactor = $jediFactor;
    }
}