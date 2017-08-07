<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\HelicopterVehicle;
use VehicleStateMachine\HelicopterVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;

/**
 * @covers HelicopterVehicle
 */
final class HelicopterVehicleStateMachineTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');

        $this->assertEquals('Boeing CH-47 Chinook', $helicopterVehicleBoeingMock->getName());

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertInstanceOf(
            HelicopterVehicleStateMachine::class,
            $helicopterVehicleBoeingStateMachine
        );

        $this->assertEquals(
            'landed',
            $helicopterVehicleBoeingStateMachine->getInitialState()
        );
    }

    public function testTakeOffOnLandedStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('landed');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('takeOff'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('takeOff');
    }

    public function testTakeOffOnRefueledStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('refueled');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('takeOff'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('takeOff');
    }

    public function testFlyOnOnTookOffStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('tookOff');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('fly'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('fly');
    }

    public function testLandingOnFlyingStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('flying');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('landing'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('landing');
    }

    public function testLandingOnTookOffStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('tookOff');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('landing'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('landing');
    }

    public function testRefuelOnLandedStateSuccess(): void
    {
        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('landed');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertTrue($helicopterVehicleBoeingStateMachine->can('refuel'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('refuel');
    }

    public function testRefuelOnFlyingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $helicopterVehicleBoeingMock = $this->createMock('Vehicle\HelicopterVehicle');
        $helicopterVehicleBoeingMock
            ->method('getName')
            ->willReturn('Boeing CH-47 Chinook');
        $helicopterVehicleBoeingMock
            ->method('getState')
            ->willReturn('flying');

        $helicopterVehicleBoeingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBoeingMock);

        $this->assertFalse($helicopterVehicleBoeingStateMachine->can('refuel'));

        // Check no exception is thrown
        $helicopterVehicleBoeingStateMachine->applyTransition('refuel');
    }
}