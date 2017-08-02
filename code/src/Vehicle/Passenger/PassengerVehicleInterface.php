<?php

namespace Vehicle\Passenger;

use Vehicle\Base\Land\LandVehicleInterface;

interface PassengerVehicleInterface extends LandVehicleInterface
{
    public function musicOn();
}