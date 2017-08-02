<?php

namespace Vehicle\Passenger\State;

class PassengerVehicleMovingMusicOnState extends AbstractPassengerVehicleState
{
    public function stop()
    {
        return new PassengerVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'moving and music switched on';
    }
}