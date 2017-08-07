<?php

namespace Vehicle;

use VehicleGas\VehicleGas;
use VehicleGas\VehicleGasInterface;
use VehicleStateMachine\VehicleStateMachineInterface;

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
     * @var string
     */
    protected $state;

    /**
     * @var VehicleStateMachineInterface
     */
    protected $stateMachine;

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

    public function getGas(): VehicleGasInterface
    {
        return $this->gas;
    }

    public function setStateMachine(VehicleStateMachineInterface $stateMachine): void
    {
        $this->stateMachine = $stateMachine;
    }

    public function getStateMachine(): VehicleStateMachineInterface
    {
        return $this->stateMachine;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
        $this->notify();
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function refuel(VehicleGas $gas)
    {
        $this->gas = $gas;
        $this->applyTransitionIfExists('refuel');
    }

    public function __call($name, $arguments)
    {
        $this->applyTransitionIfExists($name);
    }

    protected function applyTransitionIfExists($transitionName)
    {
        if (!$this->getStateMachine()) {
            throw new \Exception(('No state machine founded'));
        }

        if ($this->getStateMachine()->can($transitionName)) {
            $this->getStateMachine()->applyTransition($transitionName);
        }
    }
}