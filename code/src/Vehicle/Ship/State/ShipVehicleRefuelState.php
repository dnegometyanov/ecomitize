<?php

namespace Vehicle\Ship\State;

use Vehicle\Base\Water\State\AbstractWaterVehicleState;

class ShipVehicleRefuelState extends AbstractWaterVehicleState
{
    public function swim()
    {
        return new ShipVehicleSwimmingState();
    }

    public function __toString(): string
    {
        return 'refuel';
    }
}