<?php

namespace Vehicle\Base\Flying\State;

class FlyingVehicleTookOffState extends AbstractFlyingVehicleState implements FlyingVehicleStateInterface
{
    public function fly()
    {
        return new FlyingVehicleFlyingState();
    }

    public function __toString(): string
    {
        return 'took off';
    }
}