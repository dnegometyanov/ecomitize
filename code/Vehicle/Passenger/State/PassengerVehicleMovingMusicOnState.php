<?php

namespace Vehicle\Passenger\State;

use Vehicle\Exception\VehicleIllegalStateTransitionException;

class PassengerVehicleMovingMusicOnState extends PassengerVehicleMovingState implements PassengerVehicleStateInterface
{
    public function musicOn()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot musicOn from %s state.', $this));
    }

    public function __toString(): string
    {
        return 'moving and music switched on';
    }
}