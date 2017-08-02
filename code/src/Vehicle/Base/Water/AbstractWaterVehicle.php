<?php

namespace Vehicle\Base\Water;

use Vehicle\Base\AbstractVehicle;

/**
 * @property WaterVehicleInterface $state
 */
abstract class AbstractWaterVehicle extends AbstractVehicle implements WaterVehicleInterface
{
    public function swim()
    {
        $this->setState($this->state->swim());
    }

    public function stop()
    {
        $this->setState($this->state->stop());
    }
}