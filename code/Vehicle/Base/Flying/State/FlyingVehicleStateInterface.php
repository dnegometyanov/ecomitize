<?php

namespace Vehicle\Base\Flying\State;

use Vehicle\Base\VehicleStateInterface;

interface FlyingVehicleStateInterface extends VehicleStateInterface
{
    public function takeOff();

    public function fly();

    public function landing();
}