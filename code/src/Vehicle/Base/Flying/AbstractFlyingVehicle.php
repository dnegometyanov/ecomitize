<?php

namespace Vehicle\Base\Flying;

use Vehicle\Base\AbstractVehicle;
use Vehicle\Base\Flying\State\FlyingVehicleLandedState;

/**
 * @property FlyingVehicleStateInterface $state
 */
abstract class AbstractFlyingVehicle extends AbstractVehicle implements FlyingVehicleInterface
{
    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->setState(new FlyingVehicleLandedState());
    }

    public function takeOff()
    {
        $this->setState($this->state->takeOff());
    }

    public function fly()
    {
        $this->setState($this->state->fly());
    }

    public function landing()
    {
        $this->setState($this->state->land());
    }
}