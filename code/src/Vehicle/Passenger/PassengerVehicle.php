<?php

namespace Vehicle\Passenger;

use Vehicle\Base\Land\AbstractLandVehicle;

/**
 * @property PassengerVehicleInterface $state
 */
class PassengerVehicle extends AbstractLandVehicle implements PassengerVehicleInterface
{
    public function musicOn(): void
    {
        $this->setState($this->state->musicOn());
    }
}