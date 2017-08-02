<?php

namespace Vehicle\Passenger\State;

class PassengerVehicleStoppedState extends AbstractPassengerVehicleState
{
    public function move()
    {
        return new PassengerVehicleMovingState();
    }

    public function refuel()
    {
        return new PassengerVehicleRefuelState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}