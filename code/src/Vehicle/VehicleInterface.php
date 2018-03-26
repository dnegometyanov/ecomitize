<?php

namespace Vehicle;

use Vehicle\Action\VehicleActionInterface;
use Vehicle\StateMachine\StateMachine;

interface VehicleInterface
{
    public function addAction(VehicleActionInterface $action): VehicleInterface;

    public function getName(): string;

    public function setStateMachine(StateMachine $stateMachine): void;

    public function getStateMachine(): StateMachine;

    public function setState(string $state): void;

    public function getState(): ?string;

    public function getResult(): string;

    public function setResult($result): VehicleInterface;
}