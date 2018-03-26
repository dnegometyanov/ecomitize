<?php

namespace Vehicle\Action;

class MoveAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('moving');

        return sprintf('%s moving.', $this->vehicle->getName());
    }
}