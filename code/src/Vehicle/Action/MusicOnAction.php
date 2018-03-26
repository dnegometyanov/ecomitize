<?php

namespace Vehicle\Action;

class MusicOnAction extends AbstractVehicleAction
{
    /**
     * @return mixed
     */
    public function do(): string
    {
        $this->vehicle->setState('music on');

        return sprintf('%s music on.', $this->vehicle->getName());
    }
}