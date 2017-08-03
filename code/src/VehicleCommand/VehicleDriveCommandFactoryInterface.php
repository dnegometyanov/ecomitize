<?php

namespace VehicleCommand;

use Vehicle\Base\VehicleInterface;
use VehicleCommand\Drive\VehicleDriveCommandInterface;

interface VehicleDriveCommandFactoryInterface
{
    function createDriveCommand(VehicleInterface $vehicle): VehicleDriveCommandInterface;
}