<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\ShipVehicle;
use VehicleStateMachine\ShipVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;

/**
 * @covers ShipVehicle
 */
final class ShipVehicleStateMachineTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');

        $this->assertEquals('Boat', $shipVehicleBoatMock->getName());

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertInstanceOf(
            ShipVehicleStateMachine::class,
            $shipVehicleBoatStateMachine
        );

        $this->assertEquals(
            'stopped',
            $shipVehicleBoatStateMachine->getInitialState()
        );
    }

    public function testMoveOnStoppedStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('stopped');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('move'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('move');
    }

    public function testMoveOnRefueledStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('refueled');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('move'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('move');
    }

    public function tesSwimOnMovingStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('moving');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('swim'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('swim');
    }

    public function testStopOnMovingStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('moving');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('stop'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('stop');
    }

    public function testStopOnSwimmingStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('swimming');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('stop'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('stop');
    }

    public function testRefuelOnStoppedStateSuccess(): void
    {
        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('stopped');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertTrue($shipVehicleBoatStateMachine->can('refuel'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('refuel');
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $shipVehicleBoatMock = $this->createMock('Vehicle\ShipVehicle');
        $shipVehicleBoatMock
            ->method('getName')
            ->willReturn('Boat');
        $shipVehicleBoatMock
            ->method('getState')
            ->willReturn('moving');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoatMock);

        $this->assertFalse($shipVehicleBoatStateMachine->can('refuel'));

        // Check no exception is thrown
        $shipVehicleBoatStateMachine->applyTransition('refuel');
    }
}