<?php

namespace VehicleCommand\Drive;

use Vehicle\CargoVehicleInterface;
use VehicleGas\VehicleGas;

/**
 * @property CargoVehicleInterface $vehicle
 */
class CargoVehicleDriveCommand extends AbstractVehicleDriveCommand
{
    public function __construct(CargoVehicleInterface $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function execute()
    {
        $this->vehicle->move();
        $this->vehicle->stop();
        $this->vehicle->emptyLoads();
        $this->vehicle->refuel(new VehicleGas('Diesel'));
    }
}