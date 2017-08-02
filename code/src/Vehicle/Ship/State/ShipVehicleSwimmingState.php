<?php

namespace Vehicle\Base\Water\State;

class ShipVehicleSwimmingState extends AbstractWaterVehicleState
{
    public function stop()
    {
        return new ShipVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'swimming';
    }
}