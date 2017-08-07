<?php

namespace VehicleStateMachine;

class CargoVehicleStateMachine extends AbstractVehicleStateMachine
{
    public function getStates(): array
    {
        return [
            'stopped',
            'moving',
            'emptyLoads',
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
                new TransitionCondition('emptyLoads', 'moving'),
                new TransitionCondition('refueled', 'moving'),
            ],
            'stop' => [
                new TransitionCondition('moving', 'stopped'),
            ],
            'emptyLoads' => [
                new TransitionCondition('stopped', 'emptyLoads'),
                new TransitionCondition('refueled', 'emptyLoads'),
            ],
            'refuel' => [
                new TransitionCondition('stopped', 'refueled'),
                new TransitionCondition('emptyLoads', 'refueled'),
            ],

        ];
    }
}