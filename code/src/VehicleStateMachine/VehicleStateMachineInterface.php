<?php

namespace VehicleStateMachine;

use Vehicle\VehicleInterface;

interface VehicleStateMachineInterface
{
    public function getVehicle(): VehicleInterface;

    public function getStates(): array;

    public function getInitialState(): string;

    public function getTransitions(): array;

    public function can(string $transitionName): bool;

    public function applyTransition(string $transitionName): void;
}