<?php

namespace Vehicle\Passenger\State;

class PassengerVehicleMovingState extends AbstractPassengerVehicleState
{
    public function musicOn()
    {
        return new PassengerVehicleMovingMusicOnState();
    }

    public function stop()
    {
        return new PassengerVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'moving';
    }
}