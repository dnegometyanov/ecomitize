<?php

namespace Vehicle\Passenger\State;

use Vehicle\Base\Land\State\AbstractLandVehicleState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractPassengerVehicleState extends AbstractLandVehicleState
{
    public function musicOn()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot musicOn from %s state.', $this));
    }
}