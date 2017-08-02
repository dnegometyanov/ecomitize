<?php

namespace Vehicle\Base\Land;

use Vehicle\Base\VehicleInterface;

interface LandVehicleInterface extends VehicleInterface
{
    public function move();

    public function stop();
}