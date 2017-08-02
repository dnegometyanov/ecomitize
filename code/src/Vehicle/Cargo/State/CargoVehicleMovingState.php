<?php

namespace Vehicle\Cargo\State;

class CargoVehicleMovingState extends AbstractCargoVehicleState
{
    public function stop()
    {
        return new CargoVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'moving';
    }
}