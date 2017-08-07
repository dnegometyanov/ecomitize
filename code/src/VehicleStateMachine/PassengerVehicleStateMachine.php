<?php

namespace VehicleStateMachine;

class PassengerVehicleStateMachine extends AbstractVehicleStateMachine
{
    public function getStates(): array
    {
        return [
            'stopped',
            'moving',
            'musicOnAndMoving',
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
            'musicOn' => [
                new TransitionCondition('moving', 'musicOnAndMoving'),
            ],
            'stop' => [
                new TransitionCondition('moving', 'stopped'),
                new TransitionCondition('musicOnAndMoving', 'stopped'),
            ],
            'refuel' => [
                new TransitionCondition('stopped', 'refueled'),
            ],

        ];
    }
}