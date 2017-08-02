<?php

namespace Vehicle\Base\Water\State;

use Vehicle\Base\VehicleStateInterface;

interface WaterVehicleStateInterface extends VehicleStateInterface
{
    public function swim();

    public function stop();
}