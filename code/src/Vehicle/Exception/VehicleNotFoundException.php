<?php

namespace Vehicle\Exception;

class VehicleNotFoundException extends \Exception
{
    public function __toString()
    {
        return sprintf('Vehicle not found. %s', $this->message);
    }
}