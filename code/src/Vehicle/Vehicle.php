<?php

namespace Vehicle;

use Vehicle\Action\VehicleActionInterface;
use Vehicle\StateMachine\StateMachine;

class Vehicle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $actions = [];

    /**
     * @var string
     */
    protected $state;

    /**
     * @var StateMachine
     */
    protected $stateMachine;

    /**
     * @var
     */
    protected $result;

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    public function addAction(VehicleActionInterface $action): VehicleInterface
    {
        $action->setVehicle($this);
        $this->actions[$action->getName()] = $action;

        return $this;
    }

    /**
     * @return StateMachine
     */
    public function getStateMachine(): StateMachine
    {
        return $this->stateMachine;
    }

    /**
     * @param StateMachine $stateMachine
     * @throws \Exception
     */
    public function setStateMachine(StateMachine $stateMachine): void
    {
        $this->stateMachine = $stateMachine;
        $this->state = $stateMachine->getDefaultState();
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @throws \Exception
     */
    public function setState(string $state): void
    {
        if ($this->stateMachine && !$this->stateMachine->canSwitchToState($state)) {
            throw new \Exception(sprintf(
                'Cannot switch %s from state %s to state %s',
                $this->getName(),
                $this->getState(),
                $state
            ));
        }

        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): VehicleInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return Vehicle
     */
    public function setResult($result): VehicleInterface
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @param string $actionName
     *
     * @return VehicleActionInterface
     */
    public function getAction(string $actionName): VehicleActionInterface
    {
        return $this->actions[$actionName];
    }

    public function __call($actionName, $arguments): VehicleInterface
    {
        $actionName = StringUtils::camelCaseToUnderscore($actionName);
        $actionNames = array_keys($this->actions);

        if (!in_array($actionName, $actionNames)) {
            throw new \Exception(sprintf('Action %s not exists for vehicle %s', $actionName, $this->getName()));
        }

        $actionResult = $this->getAction($actionName)->do();
        $this->result .= $actionResult . "\r\n";

        return $this;
    }
}