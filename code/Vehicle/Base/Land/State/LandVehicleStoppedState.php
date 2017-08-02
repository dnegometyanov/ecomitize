<?php

namespace Vehicle\Base\Land\State;

class LandVehicleStoppedState extends AbstractLandVehicleState implements LandVehicleStateInterface
{
    public function move()
    {
        return new LandVehicleMovingState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}