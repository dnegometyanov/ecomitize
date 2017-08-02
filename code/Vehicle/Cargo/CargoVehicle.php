<?php

namespace Vehicle\Cargo;

use Vehicle\Base\Land\AbstractLandVehicle;

/**
 * @property CargoVehicleInterface $state
 */
class CargoVehicle extends AbstractLandVehicle implements CargoVehicleInterface
{
    /**
     * I assume there was an obvious typo error in example method, so removed a parameter and changed state string representation
     */
    public function emptyLoads()
    {
        $this->setState($this->state->emptyLoads());
    }
}