<?php

namespace Vehicle\Base\Land\State;

class LandVehicleMovingState extends AbstractLandVehicleState implements LandVehicleStateInterface
{
    public function stop()
    {
        return new LandVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'moving';
    }
}