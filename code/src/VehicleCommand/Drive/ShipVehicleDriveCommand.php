<?php

namespace VehicleCommand\Drive;

use VehicleGas\VehicleGas;
use Vehicle\ShipVehicleInterface;

/**
 * @property ShipVehicleInterface $vehicle
 */
class ShipVehicleDriveCommand extends AbstractVehicleDriveCommand
{
    public function __construct(ShipVehicleInterface $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function execute()
    {
        $this->vehicle->move();
        $this->vehicle->swim();
        $this->vehicle->stop();
        $this->vehicle->refuel(new VehicleGas('Gasoline A-92'));
    }
}