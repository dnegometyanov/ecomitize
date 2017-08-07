<?php

namespace VehicleStateMachine\Exception;

class InvalidVehicleStateMachineTransitionException extends \Exception
{
    public function __toString()
    {
        return sprintf('Invalid state transition. %s', $this->message);
    }
}