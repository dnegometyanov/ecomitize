<?php

namespace Vehicle\Base\Land;

use Vehicle\Base\AbstractVehicle;
use Vehicle\Base\Land\State\LandVehicleStateInterface;
use Vehicle\Base\VehicleStateInterface;

/**
 * @property LandVehicleStateInterface $state
 */
abstract class AbstractLandVehicle extends AbstractVehicle implements LandVehicleInterface
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