<?php

namespace Vehicle\Passenger\State;

class PassengerVehicleRefuelState extends AbstractPassengerVehicleState
{
    public function move()
    {
        return new PassengerVehicleMovingState();
    }

    public function __toString(): string
    {
        return 'refuel';
    }
}