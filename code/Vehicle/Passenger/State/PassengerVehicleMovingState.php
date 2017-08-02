<?php

namespace Vehicle\Passenger\State;

use Vehicle\Base\Land\State\LandVehicleMovingState;

class PassengerVehicleMovingState extends LandVehicleMovingState implements PassengerVehicleStateInterface
{
    public function musicOn()
    {
        return new PassengerVehicleMovingMusicOnState();
    }
}