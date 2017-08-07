<?php

namespace Vehicle;

class PassengerVehicle extends AbstractVehicle implements PassengerVehicleInterface
{
    public function getType(): string
    {
        return 'passenger';
    }
}