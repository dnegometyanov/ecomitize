<?php

namespace Vehicle\Passenger\State;

use Vehicle\Base\Land\State\LandVehicleStateInterface;

interface PassengerVehicleStateInterface extends LandVehicleStateInterface
{
    public function musicOn();
}