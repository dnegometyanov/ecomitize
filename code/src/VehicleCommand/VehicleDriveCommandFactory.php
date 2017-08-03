<?php

namespace VehicleCommand;

use Vehicle\Base\VehicleInterface;
use VehicleCommand\Drive\CargoVehicleDriveCommand;
use VehicleCommand\Drive\HelicopterVehicleDriveCommand;
use VehicleCommand\Drive\PassengerVehicleDriveCommand;
use VehicleCommand\Drive\ShipVehicleDriveCommand;
use VehicleCommand\Drive\VehicleDriveCommandInterface;
use VehicleCommand\Exception\VehicleCommandNotFoundException;

class VehicleDriveCommandFactory implements VehicleDriveCommandFactoryInterface {

    const CARGO_VEHICLE_CLASS = 'Vehicle\Cargo\CargoVehicle';
    const PASSENGER_VEHICLE_CLASS = 'Vehicle\Passenger\PassengerVehicle';
    const SHIP_VEHICLE_CLASS = 'Vehicle\Ship\ShipVehicle';
    const HELICOPTER_VEHICLE_CLASS = 'Vehicle\Helicopter\HelicopterVehicle';

    public function createDriveCommand(VehicleInterface $vehicle): VehicleDriveCommandInterface {

        $vehicleClass = get_class($vehicle);

        switch ($vehicleClass) {
            case self::CARGO_VEHICLE_CLASS:
                $driveCommand = new CargoVehicleDriveCommand($vehicle);
                break;
            case self::PASSENGER_VEHICLE_CLASS:
                $driveCommand = new PassengerVehicleDriveCommand($vehicle);
                break;
            case self::SHIP_VEHICLE_CLASS:
                $driveCommand = new ShipVehicleDriveCommand($vehicle);
                break;
            case self::HELICOPTER_VEHICLE_CLASS:
                $driveCommand = new HelicopterVehicleDriveCommand($vehicle);
                break;
            default:
                throw new VehicleCommandNotFoundException(sprintf('No drive command for vehicle of class %s.', $vehicleClass));
        }

        return $driveCommand;
    }
}