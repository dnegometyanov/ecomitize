<?php

namespace Vehicle\Helicopter\State;

class HelicopterVehicleLandingState extends AbstractHelicopterVehicleState
{
    public function takeOff()
    {
        return new HelicopterVehicleTakeOffState();
    }

    public function refuel()
    {
        return new HelicopterVehicleRefuelState();
    }

    public function __toString(): string
    {
        return 'landing';
    }
}