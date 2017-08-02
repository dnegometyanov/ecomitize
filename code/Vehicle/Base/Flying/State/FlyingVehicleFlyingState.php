<?php

namespace Vehicle\Base\Flying\State;

class FlyingVehicleFlyingState extends AbstractFlyingVehicleState implements FlyingVehicleStateInterface
{
    public function landing()
    {
        return new FlyingVehicleLandedState();
    }

    public function __toString(): string
    {
        return 'flying';
    }
}