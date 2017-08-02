<?php

namespace Vehicle\Cargo\State;

use Vehicle\Base\Land\State\LandVehicleMovingState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

class CargoVehicleMovingState extends LandVehicleMovingState implements CargoVehicleStateInterface
{
    public function emptyLoads()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot emptyLoads from %s state.', $this));
    }
}