<?php

namespace Vehicle\Action;

use Vehicle\VehicleInterface;

interface VehicleActionInterface
{
    public function setVehicle(VehicleInterface $vehicle);

    public function getName(): string;

    public function do(): string;
}