<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\HelicopterVehicle;
use VehicleStateMachine\HelicopterVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use Vehicle\VehicleFactory;
use VehicleGas\VehicleGas;

/**
 * @covers HelicopterVehicle
 */
final class HelicopterVehicleIntegrationTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $helicopterVehicleBowing = $vehicleFactory->createVehicle('helicopter', 'Boeing CH-47 Chinook');

        $this->assertEquals('Boeing CH-47 Chinook', $helicopterVehicleBowing->getName());

        $helicopterVehicleBowingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBowing);

        $this->assertInstanceOf(
            HelicopterVehicleStateMachine::class,
            $helicopterVehicleBowingStateMachine
        );

        $this->assertEquals(
            'landed',
            $helicopterVehicleBowingStateMachine->getInitialState()
        );
    }

    public function testStatesTransitionsSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $helicopterVehicleBowing = $vehicleFactory->createVehicle('helicopter', 'Boeing CH-47 Chinook');

        $kereseneGas = new VehicleGas('Keresene');

        $helicopterVehicleBowingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBowing);

        $this->assertEquals('landed', $helicopterVehicleBowing->getState());

        $this->assertTrue($helicopterVehicleBowingStateMachine->can('takeOff'));

        $helicopterVehicleBowing->takeOff();

        $this->assertEquals('tookOff', $helicopterVehicleBowing->getState());

        $helicopterVehicleBowing->fly();

        $this->assertEquals('flying', $helicopterVehicleBowing->getState());

        $helicopterVehicleBowing->landing();

        $this->assertEquals('landed', $helicopterVehicleBowing->getState());

        $helicopterVehicleBowing->refuel($kereseneGas);

        $this->assertEquals('refueled', $helicopterVehicleBowing->getState());

        $helicopterVehicleBowing->takeOff();

        $this->assertEquals('tookOff', $helicopterVehicleBowing->getState());
    }

    public function testRefuelOnTakeOffStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $vehicleFactory = new VehicleFactory();

        $helicopterVehicleBowing = $vehicleFactory->createVehicle('helicopter', 'Boeing CH-47 Chinook');

        $kereseneGas = new VehicleGas('Keresene');

        $helicopterVehicleBowingStateMachine = new HelicopterVehicleStateMachine($helicopterVehicleBowing);

        $this->assertEquals('landed', $helicopterVehicleBowing->getState());

        $this->assertTrue($helicopterVehicleBowingStateMachine->can('takeOff'));

        $helicopterVehicleBowing->takeOff();

        $this->assertEquals('tookOff', $helicopterVehicleBowing->getState());

        $helicopterVehicleBowing->refuel($kereseneGas);
    }
}