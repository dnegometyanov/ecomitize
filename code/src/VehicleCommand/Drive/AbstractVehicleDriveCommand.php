<?php

namespace VehicleCommand\Drive;

use Vehicle\VehicleInterface;
use VehicleObserver\VehicleStateObserver;

abstract class AbstractVehicleDriveCommand implements VehicleDriveCommandInterface
{
    /**
     * @var VehicleInterface
     */
    protected $vehicle;

    public function __construct(VehicleInterface $vehicle)
    {
        $this->vehicle = $vehicle;
        $vehicle->attach(new VehicleStateObserver());
    }

    abstract public function execute();
}