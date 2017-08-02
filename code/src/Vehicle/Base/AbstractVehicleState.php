<?php

namespace Vehicle\Base;

use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractVehicleState implements VehicleStateInterface
{

    public function refuel()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot refuel from %s state.', $this));
    }

    abstract function __toString(): string;
}