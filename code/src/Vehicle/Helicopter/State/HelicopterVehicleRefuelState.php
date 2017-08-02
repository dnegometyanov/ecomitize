<?php

namespace Vehicle\Helicopter\State;

class HelicopterVehicleRefuelState extends AbstractHelicopterVehicleState
{
    public function takeOff()
    {
        return new HelicopterVehicleTakeOffState();
    }

    public function __toString(): string
    {
        return 'refuel';
    }
}