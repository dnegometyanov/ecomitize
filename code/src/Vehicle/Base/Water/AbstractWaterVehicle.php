<?php

namespace Vehicle\Base\Water;

use Vehicle\Base\AbstractVehicle;
use Vehicle\Base\VehicleStateInterface;
use Vehicle\Base\Water\State\WaterVehicleStateInterface;

/**
 * @property WaterVehicleStateInterface $state
 */
abstract class AbstractWaterVehicle extends AbstractVehicle implements WaterVehicleInterface
{
    public function __construct(string $name, VehicleStateInterface $state)
    {
        parent::__construct($name);

        $this->setState($state);
    }

    public function swim()
    {
        $this->setState($this->state->swim());
    }

    public function stop()
    {
        $this->setState($this->state->stop());
    }
}