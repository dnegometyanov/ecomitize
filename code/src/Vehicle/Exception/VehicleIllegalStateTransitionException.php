<?php

namespace Vehicle\Exception;

class VehicleIllegalStateTransitionException extends \Exception
{
    public function __toString()
    {
        return sprintf('Illegal vehicle state transition. %s', $this->message);
    }
}