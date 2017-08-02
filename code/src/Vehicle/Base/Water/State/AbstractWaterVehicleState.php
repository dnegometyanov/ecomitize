<?php

namespace Vehicle\Base\Water\State;

use Vehicle\Base\AbstractVehicleState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractWaterVehicleState extends AbstractVehicleState implements WaterVehicleStateInterface
{
    public function swim()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot swim from %s state.', $this));
    }

    public function stop()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot stop from %s state.', $this));
    }
}