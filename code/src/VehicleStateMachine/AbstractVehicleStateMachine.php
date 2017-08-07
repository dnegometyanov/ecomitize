<?php

namespace VehicleStateMachine;

use Vehicle\VehicleInterface;

abstract class AbstractVehicleStateMachine implements VehicleStateMachineInterface
{
    /**
     * @var VehicleInterface
     */
    protected $vehicle;

    /**
     * @var array
     */
    protected $transitions;

    public function __construct(VehicleInterface $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->vehicle->setState($this->getInitialState());
        $this->vehicle->setStateMachine($this);
    }

    public function getVehicle(): VehicleInterface
    {
        return $this->vehicle;
    }

    public function getStates(): array
    {
        return array_keys($this->transitions);
    }

    public function addTransitionCondition(TransitionConditionInterface $transitionCondition): VehicleStateMachineInterface
    {
        $this->transitions[$transitionCondition->getName()][] = $transitionCondition;

        return $this;
    }

    public function getTransitions(): array
    {
        return $this->transitions;
    }

    public function applyTransition(string $transitionName): void
    {
        if (!$this->can($transitionName)) {
            throw new \Exception('Cannot apply transition');
        }

        /** @var $transitionCondition TransitionCondition */
        $transitionCondition = $this->getTransitionCondition($transitionName);
        $this->vehicle->setState($transitionCondition->to());
    }

    public function can(string $transitionName): bool
    {
        return (bool)$this->getTransitionCondition($transitionName);
    }

    protected function getTransitionCondition(string $transitionName): TransitionCondition
    {
        $transitionConditions = $this->getTransitionConditions($transitionName);

        $transitionCondition = null;

        foreach ($transitionConditions as $transitionCondition) {
            /** @var $transitionCondition TransitionCondition */
            if ($transitionCondition->can($this->vehicle)) {
                return $transitionCondition;
            }
        }

        return $transitionCondition;
    }

    protected function getTransitionConditions(string $transitionName)
    {
        $transitions = $this->getTransitions();
        if (!$transitions || !isset($transitions[$transitionName])) {
            throw new \Exception(sprintf('Transition %s not exists', $transitionName));
        }

        return $transitions[$transitionName];
    }

}