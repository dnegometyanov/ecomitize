<?php

namespace Vehicle;

class HelicopterVehicle extends AbstractVehicle implements HelicopterVehicleInterface
{
    public function getType(): string
    {
        return 'helicopter';
    }
}