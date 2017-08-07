<?php

namespace VehicleStateMachine;

class ShipVehicleStateMachine extends AbstractVehicleStateMachine
{
    public function getStates(): array
    {
        return [
            'stopped',
            'moving',
            'swimming',
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
                new TransitionCondition('refueled', 'moving'),
            ],
            'swim' => [
                new TransitionCondition('moving', 'swimming'),
            ],
            'stop' => [
                new TransitionCondition('moving', 'stopped'),
                new TransitionCondition('swimming', 'stopped'),
            ],
            'refuel' => [
                new TransitionCondition('stopped', 'refueled'),
            ],

        ];
    }
}