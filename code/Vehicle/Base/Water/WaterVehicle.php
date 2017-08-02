<?php

namespace Vehicle\Base\Water;

use Vehicle\Base\AbstractVehicle;

/**
 * @property WaterVehicleInterface $state
 */
class WaterVehicle extends AbstractVehicle implements WaterVehicleInterface
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