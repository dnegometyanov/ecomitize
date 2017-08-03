<?php

namespace VehicleCommand\Exception;

class VehicleCommandNotFoundException extends \Exception
{
    public function __toString()
    {
        return sprintf('Vehicle command not found. %s', $this->message);
    }
}