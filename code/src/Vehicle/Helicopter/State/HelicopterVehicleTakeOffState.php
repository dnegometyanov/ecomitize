<?php

namespace Vehicle\Helicopter\State;

class HelicopterVehicleTakeOffState extends AbstractHelicopterVehicleState
{
    public function fly()
    {
        return new HelicopterVehicleFlyingState();
    }

    public function landing()
    {
        return new HelicopterVehicleLandingState();
    }

    public function __toString(): string
    {
        return 'took off';
    }
}