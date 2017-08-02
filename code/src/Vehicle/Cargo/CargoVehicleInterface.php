<?php

namespace Vehicle\Cargo;

use Vehicle\Base\Land\LandVehicleInterface;

interface CargoVehicleInterface extends LandVehicleInterface
{
    public function emptyLoads();
}