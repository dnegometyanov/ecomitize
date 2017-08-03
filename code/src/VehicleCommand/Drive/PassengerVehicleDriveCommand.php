<?php

namespace VehicleCommand\Drive;

use VehicleGas\VehicleGas;
use Vehicle\Passenger\PassengerVehicleInterface;

/**
 * @property PassengerVehicleInterface $vehicle
 */
class PassengerVehicleDriveCommand extends AbstractVehicleDriveCommand
{
    public function __construct(PassengerVehicleInterface $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function execute()
    {
        $this->vehicle->move();
        $this->vehicle->musicOn();
        $this->vehicle->stop();
        $this->vehicle->refuel(new VehicleGas('Gasoline A-98'));
    }
}