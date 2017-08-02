<?php

namespace Vehicle\Base\Flying;

use Vehicle\Base\VehicleInterface;

interface FlyingVehicleInterface extends VehicleInterface
{
    public function takeOff();

    public function fly();

    public function landing();
}