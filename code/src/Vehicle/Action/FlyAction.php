<?php

namespace Vehicle\Action;

class FlyAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('flying');

        return sprintf('%s flying.', $this->vehicle->getName());
    }
}