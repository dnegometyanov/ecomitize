<?php

namespace Vehicle\Cargo\State;

use Vehicle\Base\Land\State\LandVehicleStoppedState;

class CargoVehicleStoppedState extends LandVehicleStoppedState implements CargoVehicleStateInterface
{
    public function emptyLoads()
    {
        return new CargoVehicleEmptyLoadsState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}