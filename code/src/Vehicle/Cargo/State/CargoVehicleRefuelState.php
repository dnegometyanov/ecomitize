<?php

namespace Vehicle\Cargo\State;

class CargoVehicleRefuelState extends AbstractCargoVehicleState
{
    public function emptyLoads()
    {
        return new CargoVehicleEmptyLoadsState();
    }

    public function move()
    {
        return new CargoVehicleMovingState();
    }

    public function __toString(): string
    {
        return 'refuel';
    }
}