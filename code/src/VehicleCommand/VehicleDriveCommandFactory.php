<?php

namespace VehicleCommand;

use Vehicle\VehicleInterface;
use VehicleCommand\Drive\CargoVehicleDriveCommand;
use VehicleCommand\Drive\VehicleDriveCommandInterface;
use VehicleCommand\Exception\VehicleCommandNotFoundException;

class VehicleDriveCommandFactory implements VehicleDriveCommandFactoryInterface
{
    public function createDriveCommand(VehicleInterface $vehicle): VehicleDriveCommandInterface
    {
        $vehicleCommandClass = sprintf('VehicleCommand\Drive\%sVehicleDriveCommand', ucfirst($vehicle->getType()));

        if (!class_exists($vehicleCommandClass)) {
            throw new VehicleCommandNotFoundException(sprintf('No drive command for vehicle of class %s.', $vehicleCommandClass));
        }

        $driveCommand = new $vehicleCommandClass($vehicle);

        return $driveCommand;
    }
}