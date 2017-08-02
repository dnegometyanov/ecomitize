<?php

namespace Vehicle\Cargo\State;

use Vehicle\Base\Land\State\LandVehicleStateInterface;

interface CargoVehicleStateInterface extends LandVehicleStateInterface
{
    public function emptyLoads();
}