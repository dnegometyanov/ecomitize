<?php
namespace Vehicle\Base;

abstract class AbstractVehicleState implements VehicleStateInterface
{
    abstract function __toString(): string;
}