<?php

namespace Vehicle\Base;

use Vehicle\Gas\VehicleGasInterface;

abstract class AbstractVehicle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var VehicleStateInterface
     */
    protected $state;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setState(VehicleStateInterface $state)
    {
        $this->state = $state;
    }

    public function getState(): VehicleStateInterface
    {
        return $this->state;
    }

    public function refuel(VehicleGasInterface $gas)
    {
        $this->setState($this->state->refuel());
    }
}