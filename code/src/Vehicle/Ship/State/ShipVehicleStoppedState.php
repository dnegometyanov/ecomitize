<?php

namespace Vehicle\Base\Water\State;

use Vehicle\Base\Land\State\AbstractShipVehicleState;

class ShipVehicleStoppedState extends AbstractShipVehicleState
{
    public function swim()
    {
        return new ShipVehicleSwimmingState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}