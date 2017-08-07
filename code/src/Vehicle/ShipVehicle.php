<?php

namespace Vehicle;

class ShipVehicle extends AbstractVehicle implements ShipVehicleInterface
{
    public function getType(): string
    {
        return 'ship';
    }
}