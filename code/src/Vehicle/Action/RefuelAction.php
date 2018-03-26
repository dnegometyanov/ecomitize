<?php

namespace Vehicle\Action;

class RefuelAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('refueled');

        return sprintf('%s refueled.', $this->vehicle->getName());
    }
}