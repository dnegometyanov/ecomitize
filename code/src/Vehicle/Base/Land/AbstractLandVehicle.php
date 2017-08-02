<?php

namespace Vehicle\Base\Land;

use Vehicle\Base\AbstractVehicle;
use Vehicle\Base\VehicleStateInterface;

/**
 * @property LandVehicleInterface $state
 */
abstract class AbstractLandVehicle extends AbstractVehicle
{
    public function __construct(string $name, VehicleStateInterface $state)
    {
        parent::__construct($name);

        $this->setState($state);
    }

    public function move()
    {
        $this->setState($this->state->move());
    }

    public function stop()
    {
        $this->setState($this->state->stop());
    }
}