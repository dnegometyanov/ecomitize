<?php

namespace Vehicle\Base\Water\State;

class WaterVehicleSwimmingState extends AbstractWaterVehicleState
{
    public function stop()
    {
        return new WaterVehicleStoppedState();
    }

    public function __toString(): string
    {
        return 'swimming';
    }
}