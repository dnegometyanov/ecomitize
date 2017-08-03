<?php

namespace Vehicle\Base;

use VehicleGas\VehicleGasInterface;

abstract class AbstractVehicle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var VehicleGasInterface
     */
    protected $gas;

    /**
     * @var VehicleStateInterface
     */
    protected $state;

    /**
     * @var \SplObjectStorage
     */
    protected $observers;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->observers = new \SplObjectStorage();
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setState(VehicleStateInterface $state)
    {
        $this->state = $state;
        $this->notify();
    }

    public function getState(): VehicleStateInterface
    {
        return $this->state;
    }

    public function refuel(VehicleGasInterface $gas)
    {
        $this->gas = $gas;
        $this->setState($this->state->refuel());
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    protected function isRefuelState()
    {
        return false;
    }

    public function __toString()
    {
        if ($this->isRefuelState()) {
            return sprintf('%s %s %s', $this->name, $this->state, $this->gas);

        }

        return sprintf('%s %s', $this->name, $this->state);
    }
}