<?php
namespace Vehicle\Base;

abstract class AbstractVehicle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var VehicleStateInterface
     */
    protected $state;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setState(VehicleStateInterface $state)
    {
        $this->state = $state;
    }
}