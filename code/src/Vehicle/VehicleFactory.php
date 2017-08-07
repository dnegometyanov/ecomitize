<?php

namespace Vehicle;

use Vehicle\Exception\VehicleNotFoundException;
use VehicleStateMachine\Exception\VehicleStateMachineNotFoundException;

class VehicleFactory implements VehicleFactoryInterface
{
    public function createVehicle(string $type, string $name): VehicleInterface
    {
        $vehicleClass = sprintf('Vehicle\%sVehicle', ucfirst($type));
        $vehicleStateMachineClass = sprintf('VehicleStateMachine\%sVehicleStateMachine', ucfirst($type));

        if (!class_exists($vehicleClass)) {
            throw new VehicleNotFoundException(sprintf('Vehicle of class %s not founded.', $vehicleClass));
        }

        $vehicle = new $vehicleClass($name);

        if (!class_exists($vehicleStateMachineClass)) {
            throw new VehicleStateMachineNotFoundException(sprintf('Vehicle state machine of class %s not founded.', $vehicleStateMachineClass));
        }

        $vehicleStateMachine = new $vehicleStateMachineClass($vehicle);

        return $vehicle;
    }
}