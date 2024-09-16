<?php

namespace Model;

use ArrayAccess;
use ArrayIterator;
use ArrayObject;
use IteratorAggregate;
use Traversable;

class ShipCollection implements ArrayAccess, IteratorAggregate
{
    public function __construct(private array $ships)
    {}

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->ships);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return array_key_exists($offset, $this->ships) ? $this->ships[$offset] : null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->ships[] = $value;
        }else{
            $this->ships[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        if ($this->offsetExists($offset)){
            unset($this->ships[$offset]);
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator(new ArrayObject($this->ships));
    }

    public function removeAllBrokenShips()
    {
        /**
         * @var  $key
         * @var AbstractShip $ship
         */
        foreach ($this->ships as $key => $ship) {
            if ($ship->isUnderRepair()){
                unset($this->ships[$key]);
            }
        }
    }
}