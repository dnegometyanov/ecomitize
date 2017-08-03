<?php

namespace Vehicle\Base;

use Vehicle\Gas\VehicleGasInterface;

interface VehicleInterface
{
    public function getName(): string;

    public function getState(): VehicleStateInterface;

    public function refuel(VehicleGasInterface $gas);
}