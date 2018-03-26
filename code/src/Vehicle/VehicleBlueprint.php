<?php

namespace Vehicle;

use Vehicle\Action\VehicleActionInterface;
use Vehicle\StateMachine\StateMachine;

class VehicleBlueprint implements VehicleBlueprintInterface
{
    /**
     * @var array
     */
    protected $actions;

    /**
     * @var array
     */
    protected $transitions = [];

    public function __construct(array $actions, array $transitions = [])
    {
        $this->actions = $actions;
        $this->transitions = $transitions;
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @param array $actions
     * @return VehicleBlueprint
     */
    public function setActions(array $actions): VehicleBlueprintInterface
    {
        $this->actions = $actions;

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
     * @param array $transitions
     * @return VehicleBlueprint
     */
    public function setTransitions(array $transitions): VehicleBlueprintInterface
    {
        $this->transitions = $transitions;

        return $this;
    }
}