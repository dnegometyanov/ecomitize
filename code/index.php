<?php

use Vehicle\Cargo\CargoVehicle;
use Vehicle\Cargo\State\CargoVehicleStoppedState;
use Vehicle\Passenger\PassengerVehicle;
use Vehicle\Helicopter\HelicopterVehicle;
use Vehicle\Ship\ShipVehicle;
use Vehicle\Passenger\State\PassengerVehicleStoppedState;
use Vehicle\Helicopter\State\HelicopterVehicleLandingState;
use Vehicle\Ship\State\ShipVehicleStoppedState;
use VehicleCommand\VehicleDriveCommandFactory;
use VehicleGarage\VehicleGarage;

require ('./vendor/autoload.php');

$vehicleGarage = new VehicleGarage();
$vehicleGarage
    ->addVehicle(new PassengerVehicle('BMW', new PassengerVehicleStoppedState()))
    ->addVehicle(new CargoVehicle('Kamaz', new CargoVehicleStoppedState()))
    ->addVehicle(new HelicopterVehicle('Boeing CH-47 Chinook', new HelicopterVehicleLandingState()))
    ->addVehicle(new ShipVehicle('Boat', new ShipVehicleStoppedState()))
;

$vehicleDriveCommandFactory = new VehicleDriveCommandFactory();

foreach ($vehicleGarage->getVehicles() as $vehicle) {
    $driveCommand = $vehicleDriveCommandFactory->createDriveCommand($vehicle);
    $driveCommand->execute();
}