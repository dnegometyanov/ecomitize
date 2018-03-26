<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Vehicle\PassengerVehicle;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use VehicleStateMachine\PassengerVehicleStateMachine;

/**
 * @covers PassengerVehicle
 */
final class VehicleTest extends TestCase
{
    public function testVehicleSuccess(): void
    {
        $vehicleMoveActionMock = $this->createMock('Vehicle\Action\MoveAction');
        $vehicleMoveActionMock
            ->method('getName')
            ->willReturn('move');

        $vehicleMoveActionMock
            ->method('do')
            ->willReturn('SomeVehicle moving.');

        $vehicle = new Vehicle\Vehicle();
        $vehicle
            ->setName('SomeVehicle')
            ->addAction($vehicleMoveActionMock);


        $this->assertInstanceOf(
            \Vehicle\Vehicle::class,
            $vehicle
        );

        $vehicle->move();

        $this->assertEquals(
            'SomeVehicle moving.',
            trim($vehicle->getResult())
        );
    }
}