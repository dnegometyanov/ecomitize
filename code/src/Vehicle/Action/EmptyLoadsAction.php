<?php

namespace Vehicle\Action;

class EmptyLoadsAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('empty loads');

        return sprintf('%s empty loads.', $this->vehicle->getName());
    }
}