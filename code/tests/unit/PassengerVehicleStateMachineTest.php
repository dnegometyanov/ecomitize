<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\PassengerVehicle;
use VehicleStateMachine\PassengerVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;

/**
 * @covers PassengerVehicle
 */
final class PassengerVehicleStateMachineTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');

        $this->assertEquals('BMW', $passengerVehicleBmwMock->getName());

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertInstanceOf(
            PassengerVehicleStateMachine::class,
            $passengerVehicleBmwStateMachine
        );

        $this->assertEquals(
            'stopped',
            $passengerVehicleBmwStateMachine->getInitialState()
        );
    }

    public function testMoveOnStoppedStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('stopped');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('move'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('move');
    }

    public function testMoveOnRefueledStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('refueled');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('move'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('move');
    }

    public function testMusicOnOnMovingStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('moving');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('musicOn'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('musicOn');
    }

    public function testStopOnMovingStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('moving');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('stop'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('stop');
    }

    public function testStopOnMusicOnAndMovingStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('musicOnAndMoving');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('stop'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('stop');
    }


    public function testRefuelOnStoppedStateSuccess(): void
    {
        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('stopped');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertTrue($passengerVehicleBmwStateMachine->can('refuel'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('refuel');
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $passengerVehicleBmwMock = $this->createMock('Vehicle\PassengerVehicle');
        $passengerVehicleBmwMock
            ->method('getName')
            ->willReturn('BMW');
        $passengerVehicleBmwMock
            ->method('getState')
            ->willReturn('moving');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmwMock);

        $this->assertFalse($passengerVehicleBmwStateMachine->can('refuel'));

        // Check no exception is thrown
        $passengerVehicleBmwStateMachine->applyTransition('refuel');
    }
}