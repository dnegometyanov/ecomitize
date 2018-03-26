<?php

namespace Vehicle\Action;

class LandingAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('landed');

        return sprintf('%s landed.', $this->vehicle->getName());
    }
}