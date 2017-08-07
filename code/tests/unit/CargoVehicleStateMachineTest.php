<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\CargoVehicle;
use VehicleStateMachine\CargoVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleStateMachineTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');

        $this->assertEquals('Kamaz', $cargoVehicleKamazMock->getName());

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertInstanceOf(
            CargoVehicleStateMachine::class,
            $cargoVehicleKamazStateMachine
        );

        $this->assertEquals(
            'stopped',
            $cargoVehicleKamazStateMachine->getInitialState()
        );
    }

    public function testMoveOnStoppedStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('stopped');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('move'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('move');
    }

    public function testMoveOnEmptyLoadsStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('emptyLoads');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('move'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('move');
    }

    public function testMoveOnRefueledStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('refueled');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('move'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('move');
    }

    public function testStopOnMovingStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('moving');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('stop'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('stop');
    }

    public function testEmptyLoadsOnStoppedStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('stopped');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('emptyLoads'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('emptyLoads');
    }

    public function testEmptyLoadsOnRefueledStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('refueled');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('emptyLoads'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('emptyLoads');
    }

    public function testRefuelOnStoppedStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('stopped');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('refuel'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('refuel');
    }

    public function testRefuelOnEmptyLoadsStateSuccess(): void
    {
        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('emptyLoads');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertTrue($cargoVehicleKamazStateMachine->can('refuel'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('refuel');
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('moving');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertFalse($cargoVehicleKamazStateMachine->can('refuel'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('refuel');
    }

    public function testEmptyLoadsOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $cargoVehicleKamazMock = $this->createMock('Vehicle\CargoVehicle');
        $cargoVehicleKamazMock
            ->method('getName')
            ->willReturn('Kamaz');
        $cargoVehicleKamazMock
            ->method('getState')
            ->willReturn('moving');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamazMock);

        $this->assertFalse($cargoVehicleKamazStateMachine->can('emptyLoads'));

        // Check no exception is thrown
        $cargoVehicleKamazStateMachine->applyTransition('emptyLoads');
    }
}