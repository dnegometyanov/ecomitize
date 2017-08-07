<?php

use VehicleCommand\VehicleDriveCommandFactory;
use VehicleGarage\VehicleGarage;
use Vehicle\VehicleFactory;

require ('./vendor/autoload.php');

$vehicleFactory = new VehicleFactory();

$vehicleGarage = new VehicleGarage();
$vehicleGarage
    ->addVehicle($vehicleFactory->createVehicle('cargo', 'Kamaz'))
    ->addVehicle($vehicleFactory->createVehicle('passenger', 'BMW'))
    ->addVehicle($vehicleFactory->createVehicle('helicopter', 'Boeing CH-47 Chinook'))
    ->addVehicle($vehicleFactory->createVehicle('ship', 'Boat'))
;

$vehicleDriveCommandFactory = new VehicleDriveCommandFactory();

foreach ($vehicleGarage->getVehicles() as $vehicle) {
    $driveCommand = $vehicleDriveCommandFactory->createDriveCommand($vehicle);
    $driveCommand->execute();
}