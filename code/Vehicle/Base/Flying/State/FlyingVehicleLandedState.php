<?php

namespace Vehicle\Base\Flying\State;

class FlyingVehicleLandedState extends AbstractFlyingVehicleState implements FlyingVehicleStateInterface
{
    public function takeOff()
    {
        return new FlyingVehicleTookOffState();
    }

    public function __toString(): string
    {
        return 'landing';
    }
}