<?php

namespace Vehicle\Action;

class StopAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('stopped');

        return sprintf('%s stopped.', $this->vehicle->getName());
    }
}