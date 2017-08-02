<?php

namespace Vehicle\Helicopter\State;

class HelicopterVehicleFlyingState extends AbstractHelicopterVehicleState
{
    public function landing()
    {
        return new HelicopterVehicleLandingState();
    }

    public function __toString(): string
    {
        return 'flying';
    }
}