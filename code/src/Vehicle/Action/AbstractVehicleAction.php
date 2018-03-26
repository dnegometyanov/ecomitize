<?php

namespace Vehicle\Action;

use Vehicle\StringUtils;
use Vehicle\VehicleInterface;

abstract class AbstractVehicleAction implements VehicleActionInterface
{
    /**
     * @var VehicleInterface $vehicle
     */
    protected $vehicle;

    /**
     * @param VehicleInterface $vehicle
     */
    public function setVehicle(VehicleInterface $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function getName(): string
    {
        return StringUtils::camelCaseToUnderscore(str_replace('Action', '', (new \ReflectionClass($this))->getShortName()));
    }

    /**
     * @return mixed
     */
    abstract public function do(): string;

}