<?php

namespace Vehicle\Helicopter;

use Vehicle\Base\Flying\AbstractFlyingVehicle;

class HelicopterVehicle extends AbstractFlyingVehicle implements HelicopterVehicleInterface
{
    protected function isRefuelState()
    {
        return get_class($this->state) == 'Vehicle\Helicopter\State\HelicopterVehicleRefuelState';
    }
}