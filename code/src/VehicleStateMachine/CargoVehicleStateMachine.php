<?php

namespace VehicleStateMachine;

class CargoVehicleStateMachine extends AbstractVehicleStateMachine
{
    public function getStates(): array
    {
        return [
            'stopped',
            'moving',
            'empty',
            'refueled'
        ];
    }

    public function getInitialState(): string
    {
        return 'stopped';
    }

    public function getTransitions(): array
    {
        return [
            'move' => [
                new TransitionCondition('stopped', 'moving'),
                new TransitionCondition('empty', 'moving'),
                new TransitionCondition('refueled', 'moving'),
            ],
            'stop' => [
                new TransitionCondition('moving', 'stopped'),
            ],
            'emptyLoads' => [
                new TransitionCondition('stopped', 'empty'),
            ],
            'refuel' => [
                new TransitionCondition('stopped', 'refueled'),
                new TransitionCondition('empty', 'refueled'),
            ],

        ];
    }
}