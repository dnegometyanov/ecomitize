<?php

namespace VehicleStateMachine;

use Vehicle\VehicleInterface;

class TransitionCondition implements TransitionConditionInterface
{
    protected $from;
    protected $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function from(): string
    {
        return $this->from;

    }

    public function to(): string
    {
        return $this->to;
    }

    public function can(VehicleInterface $vehicle): bool
    {
        return $this->from == $vehicle->getState();
    }
}