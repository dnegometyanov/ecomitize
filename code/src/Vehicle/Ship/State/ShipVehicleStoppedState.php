<?php

namespace Vehicle\Ship\State;

class ShipVehicleStoppedState extends AbstractShipVehicleState
{
    public function swim()
    {
        return new ShipVehicleSwimmingState();
    }

    public function refuel()
    {
        return new ShipVehicleRefuelState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}