<?php

namespace Vehicle\Base\Land;
use Vehicle\Base\AbstractVehicle;
use Vehicle\Base\Land\State\LandVehicleStoppedState;

/**
 * @property LandVehicleInterface $state
 */
abstract class AbstractLandVehicle extends AbstractVehicle
{
    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->setState(new LandVehicleStoppedState());
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