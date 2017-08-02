<?php

namespace Vehicle\Cargo\State;

use Vehicle\Base\Land\State\LandVehicleStoppedState;
use Vehicle\Exception\VehicleIllegalStateTransitionException;

class CargoVehicleEmptyLoadsState extends LandVehicleStoppedState implements CargoVehicleStateInterface
{
    public function move()
    {
        return new CargoVehicleMovingState();
    }

    public function emptyLoads()
    {
        throw new VehicleIllegalStateTransitionException(sprintf('Cannot emptyLoads from %s state.', $this));
    }

    public function __toString(): string
    {
        return 'empty loads';
    }
}