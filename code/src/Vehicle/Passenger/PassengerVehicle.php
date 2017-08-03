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

    protected function isRefuelState()
    {
        return get_class($this->state) == 'Vehicle\Passenger\State\PassengerVehicleRefuelState';
    }
}