<?php

namespace Vehicle\Base\Land\State;

use Vehicle\Base\VehicleStateInterface;

interface LandVehicleStateInterface extends VehicleStateInterface
{
    public function move();

    public function stop();
}