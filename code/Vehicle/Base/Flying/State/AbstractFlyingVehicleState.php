<?php

namespace Vehicle\Base\Flying\State;

use Vehicle\Base\AbstractVehicleState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

abstract class AbstractFlyingVehicleState extends AbstractVehicleState implements FlyingVehicleStateInterface
{
    public function takeOff() {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot takeOff from %s state.', $this));
    }

    public function fly() {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot fly from %s state.', $this));
    }

    public function landing() {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot landing from %s state.', $this));
    }
}