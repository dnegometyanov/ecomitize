<?php

namespace VehicleCommand\Drive;

use Vehicle\Gas\VehicleGas;
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
        $this->vehicle->swim();
        $this->vehicle->stop();
        $this->vehicle->refuel(new VehicleGas('Keresene'));
    }
}