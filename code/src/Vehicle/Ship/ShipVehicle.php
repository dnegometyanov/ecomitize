<?php

namespace Vehicle\Ship;

use Vehicle\Base\Water\AbstractWaterVehicle;

/**
 * @property ShipVehicleInterface $state
 */
class ShipVehicle extends AbstractWaterVehicle implements ShipVehicleInterface
{
    protected function isRefuelState()
    {
        return get_class($this->state) == 'Vehicle\Helicopter\State\HelicopterVehicleRefuelState';
    }
}