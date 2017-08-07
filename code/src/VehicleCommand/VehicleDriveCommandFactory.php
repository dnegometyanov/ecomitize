<?php

namespace VehicleCommand;

use Vehicle\VehicleInterface;
use VehicleCommand\Drive\CargoVehicleDriveCommand;
use VehicleCommand\Drive\VehicleDriveCommandInterface;
use VehicleCommand\Exception\VehicleCommandNotFoundException;

class VehicleDriveCommandFactory implements VehicleDriveCommandFactoryInterface
{

    const CARGO_VEHICLE_CLASS = 'Vehicle\CargoVehicle';

    public function createDriveCommand(VehicleInterface $vehicle): VehicleDriveCommandInterface
    {
        $vehicleClass = get_class($vehicle);

        switch ($vehicleClass) {
            case self::CARGO_VEHICLE_CLASS:
                $driveCommand = new CargoVehicleDriveCommand($vehicle);
                break;
            default:
                throw new VehicleCommandNotFoundException(sprintf('No drive command for vehicle of class %s.', $vehicleClass));
        }

        return $driveCommand;
    }
}