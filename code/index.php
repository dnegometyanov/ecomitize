<?php

use Vehicle\Cargo\CargoVehicle;
use Vehicle\Cargo\State\CargoVehicleStoppedState;
use Vehicle\Passenger\PassengerVehicle;
use Vehicle\Passenger\State\PassengerVehicleStoppedState;
use VehicleCommand\VehicleDriveCommandFactory;
use Vehicle\Garage\VehicleGarage;

require ('./vendor/autoload.php');

$vehicleGarage = new VehicleGarage();
$vehicleGarage
    ->addVehicle(new CargoVehicle('Kamaz', new  CargoVehicleStoppedState()))
    ->addVehicle(new PassengerVehicle('BMW', new  PassengerVehicleStoppedState()));

$vehicleDriveCommandFactory = new VehicleDriveCommandFactory();

foreach ($vehicleGarage as $vehicle) {
    $driveCommand = $vehicleDriveCommandFactory->createDriveCommand($vehicle);
    $driveCommand->execute();
}