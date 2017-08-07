<?php

namespace VehicleStateMachine;

use Vehicle\VehicleInterface;

interface TransitionConditionInterface
{
    public function from(): string;

    public function to(): string;

    public function can(VehicleInterface $vehicle): bool;

}