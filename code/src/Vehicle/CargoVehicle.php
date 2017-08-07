<?php

namespace Vehicle;

class CargoVehicle extends AbstractVehicle implements CargoVehicleInterface
{
    public function getType(): string
    {
        return 'cargo';
    }
}