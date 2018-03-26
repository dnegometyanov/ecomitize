<?php

namespace Vehicle\Action;

class SwimAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('swimming');

        return sprintf('%s swimming.', $this->vehicle->getName());
    }
}