<?php

namespace Vehicle;

use VehicleGas\VehicleGasInterface;
use VehicleStateMachine\VehicleStateMachineInterface;

interface VehicleInterface extends \SplSubject
{
    public function getName(): string;

    public function getGas(): VehicleGasInterface;

    public function setStateMachine(VehicleStateMachineInterface $stateMachine): void;

    public function getStateMachine(): VehicleStateMachineInterface;

    public function setState(string $state): void;

    public function getState(): string;
}