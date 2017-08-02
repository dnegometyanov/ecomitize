<?php

namespace Vehicle\Base\Water;

use Vehicle\Base\VehicleInterface;

interface WaterVehicleInterface extends VehicleInterface
{
    public function swim();

    public function stop();
}