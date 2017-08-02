<?php

namespace Vehicle\Cargo\State;

class CargoVehicleStoppedState extends AbstractCargoVehicleState
{
    public function emptyLoads()
    {
        return new CargoVehicleEmptyLoadsState();
    }

    public function move()
    {
        return new CargoVehicleMovingState();
    }

    public function refuel()
    {
        return new CargoVehicleRefuelState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}