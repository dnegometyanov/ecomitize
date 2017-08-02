<?php

namespace Vehicle\Cargo\State;

use Vehicle\Base\Land\State\AbstractLandVehicleState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractCargoVehicleState extends AbstractLandVehicleState
{
    public function emptyLoads()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot move from %s state.', $this));
    }
}