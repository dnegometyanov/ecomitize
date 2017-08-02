<?php

namespace Vehicle\Ship\State;

class ShipVehicleSwimmingState extends AbstractShipVehicleState
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