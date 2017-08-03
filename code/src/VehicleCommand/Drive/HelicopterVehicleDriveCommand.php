<?php

namespace VehicleCommand\Drive;

use VehicleGas\VehicleGas;
use Vehicle\Helicopter\HelicopterVehicleInterface;

/**
 * @property HelicopterVehicleInterface $vehicle
 */
class HelicopterVehicleDriveCommand extends AbstractVehicleDriveCommand
{
    public function __construct(HelicopterVehicleInterface $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function execute()
    {
        $this->vehicle->takeOff();
        $this->vehicle->fly();
        $this->vehicle->landing();
        $this->vehicle->refuel(new VehicleGas('Keresene'));
    }
}