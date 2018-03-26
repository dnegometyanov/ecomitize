<?php

namespace Vehicle;

use Vehicle\StateMachine\StateMachine;

class VehicleFactory
{
    public function createVehicle(string $name, array $actions, array $transitions = []): VehicleInterface
    {
        $vehicle = new Vehicle();

        $vehicle->setName($name);

        foreach ($actions as $action) {

            $vehicleActionClass = sprintf('Vehicle\Action\%sAction', StringUtils::underscoreToUpperCamelCase($action));

            if (!class_exists($vehicleActionClass)) {
                throw new \Exception(sprintf('Vehicle action %s not founded.', StringUtils::underscoreToUpperCamelCase($vehicleActionClass)));
            }

            $vehicleAction = new $vehicleActionClass();

            $vehicle->addAction($vehicleAction);
        }

        if ($transitions) {
            $vehicleStateMachine = new StateMachine();
            $vehicleStateMachine
                ->setVehicle($vehicle)
                ->setTransitions($transitions);

            $vehicle->setStateMachine($vehicleStateMachine);
        }

        return $vehicle;
    }

    public function createVehicleFromBluePrint(string $name, VehicleBlueprint $vehicleBlueprint): VehicleInterface
    {
        return $this->createVehicle($name, $vehicleBlueprint->getActions(), $vehicleBlueprint->getTransitions());
    }
}