<?php

namespace Vehicle\Cargo\State;

class CargoVehicleEmptyLoadsState extends AbstractCargoVehicleState
{
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
        return 'empty loads';
    }
}