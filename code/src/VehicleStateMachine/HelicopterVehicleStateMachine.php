<?php

namespace VehicleStateMachine;

class HelicopterVehicleStateMachine extends AbstractVehicleStateMachine
{
    public function getStates(): array
    {
        return [
            'tookOff',
            'flying',
            'landed',
            'refueled'
        ];
    }

    public function getInitialState(): string
    {
        return 'landed';
    }

    public function getTransitions(): array
    {
        return [
            'takeOff' => [
                new TransitionCondition('landed', 'tookOff'),
                new TransitionCondition('refueled', 'tookOff'),
            ],
            'fly' => [
                new TransitionCondition('tookOff', 'flying'),
            ],
            'landing' => [
                new TransitionCondition('flying', 'landed'),
                new TransitionCondition('tookOff', 'landed'),
            ],
            'refuel' => [
                new TransitionCondition('landed', 'refueled'),
            ],

        ];
    }
}