<?php

namespace Vehicle\Passenger\State;

use Vehicle\Base\Land\State\LandVehicleStoppedState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

class PassengerVehicleStoppedState extends LandVehicleStoppedState implements PassengerVehicleStateInterface
{
    public function musicOn()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot musicOn from %s state.', $this));
    }
}