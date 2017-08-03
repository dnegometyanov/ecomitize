<?php

namespace Vehicle\Garage;
use Vehicle\Base\VehicleInterface;

class VehicleGarage
{
    /**
     * @var array
     */
    protected $vehicles = [];

    function addVehicle(VehicleInterface $vehicle)
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    function getVehicles()
    {
        foreach ($this->vehicles as $vehicle) {
            yield $vehicle;
        }
    }
}