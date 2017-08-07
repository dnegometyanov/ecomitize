<?php

namespace VehicleGarage;

use Vehicle\VehicleInterface;

class VehicleGarage
{
    /**
     * @var array
     */
    protected $vehicles;

    public function __construct()
    {
        $this->vehicles = [];
    }

    public function addVehicle(VehicleInterface $vehicle)
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    public function getVehicles()
    {
        return $this->vehicles;
    }
}