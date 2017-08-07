<?php

namespace Vehicle;

interface VehicleFactoryInterface
{
    function createVehicle(string $vehicleType, string $name): VehicleInterface;
}