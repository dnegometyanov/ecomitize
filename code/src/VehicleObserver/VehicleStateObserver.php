<?php

namespace VehicleObserver;

use Vehicle\VehicleInterface;

class VehicleStateObserver implements \SplObserver
{
    /**
     * @param \SplSubject $vehicle
     */
    public function update(\SplSubject $vehicle)
    {
        /** @var $subject VehicleInterface */
        if ($vehicle->getState() == 'refueled') {
            echo sprintf("%s %s %s\n", $vehicle->getName(), $vehicle->getState(), $vehicle->getGas());
        } else {
            echo sprintf("%s %s\n", $vehicle->getName(), $vehicle->getState());
        }
    }
}