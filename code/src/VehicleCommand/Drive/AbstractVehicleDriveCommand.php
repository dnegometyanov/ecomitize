<?php

namespace VehicleCommand\Drive;

use Vehicle\Base\VehicleInterface;

abstract class AbstractVehicleDriveCommand implements VehicleDriveCommandInterface {

    /**
     * @var VehicleInterface
     */
    protected $vehicle;

    public function __construct (VehicleInterface $vehicle) {
        $this->vehicle = $vehicle;
    }

    abstract public function execute();
}