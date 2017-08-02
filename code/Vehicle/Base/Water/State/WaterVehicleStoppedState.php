<?php

namespace Vehicle\Base\Water\State;

class WaterVehicleStoppedState extends AbstractWaterVehicleState
{
    public function swim()
    {
        return new WaterVehicleSwimmingState();
    }

    public function __toString(): string
    {
        return 'stopped';
    }
}