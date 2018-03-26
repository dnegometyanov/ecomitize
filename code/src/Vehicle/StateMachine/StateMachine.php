<?php

namespace Vehicle\StateMachine;

class StateMachine
{
    protected $vehicle;

    protected $transitions;

    /**
     * @return array
     */
    public function getStates(): array
    {
        return array_keys($this->transitions);
    }

    /**
     * @return string
     */
    public function getDefaultState(): string
    {
        return $this->getStates()[0];
    }

    /**
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param mixed $vehicle
     *
     * @return StateMachine
     */
    public function setVehicle($vehicle): StateMachine
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * @return array
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }

    /**
     * @param mixed $transitions
     * @return StateMachine
     */
    public function setTransitions($transitions): StateMachine
    {
        $this->transitions = $transitions;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return bool
     */
    public function canSwitchToState(string $state): bool
    {
        $currentState = $this->vehicle->getState();

        $allowedTransitionsForCurrentState = $this->transitions[$currentState];

        $canSwitchToState = in_array($state, $allowedTransitionsForCurrentState);

        return (bool)$canSwitchToState;
    }
}