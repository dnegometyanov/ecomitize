<?php

namespace Vehicle\Base;

use VehicleGas\VehicleGasInterface;

interface VehicleInterface extends \SplSubject
{
    public function getName(): string;

    public function getState(): VehicleStateInterface;

    public function refuel(VehicleGasInterface $gas);
}