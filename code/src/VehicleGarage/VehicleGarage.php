<?php

namespace VehicleGarage;

use Vehicle\Base\VehicleInterface;

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
        foreach ($this->vehicles as $vehicle) {
            yield $vehicle;
        }
    }
}