<?php

namespace Vehicle\Action;

class TakeOffAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('took_off');

        return sprintf('%s took off.', $this->vehicle->getName());
    }
}