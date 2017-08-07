<?php

namespace VehicleStateMachine\Exception;

class VehicleStateMachineNotFoundException extends \Exception
{
    public function __toString()
    {
        return sprintf('Vehicle state machine not found. %s', $this->message);
    }
}