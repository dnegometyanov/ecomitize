<?php

namespace Vehicle\Base\Land\State;

use Vehicle\Base\AbstractVehicleState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractLandVehicleState extends AbstractVehicleState implements LandVehicleStateInterface
{
    public function move() {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot move from %s state.', $this));
    }

    public function stop() {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot move from %s state.', $this));
    }
}