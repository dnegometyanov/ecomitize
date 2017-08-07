<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\PassengerVehicle;
use VehicleStateMachine\PassengerVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use Vehicle\VehicleFactory;
use VehicleGas\VehicleGas;

/**
 * @covers PassengerVehicle
 */
final class PassengerVehicleIntegrationTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $passengerVehicleBmw = $vehicleFactory->createVehicle('passenger', 'BMW');

        $this->assertEquals('BMW', $passengerVehicleBmw->getName());

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmw);

        $this->assertInstanceOf(
            PassengerVehicleStateMachine::class,
            $passengerVehicleBmwStateMachine
        );

        $this->assertEquals(
            'stopped',
            $passengerVehicleBmwStateMachine->getInitialState()
        );
    }

    public function testStatesTransitionsSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $passengerVehicleBmw = $vehicleFactory->createVehicle('passenger', 'BMW');

        $dieselGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmw);

        $this->assertEquals('stopped', $passengerVehicleBmw->getState());

        $this->assertTrue($passengerVehicleBmwStateMachine->can('move'));

        $passengerVehicleBmw->move();

        $this->assertEquals('moving', $passengerVehicleBmw->getState());

        $passengerVehicleBmw->musicOn();

        $this->assertEquals('musicOnAndMoving', $passengerVehicleBmw->getState());

        $passengerVehicleBmw->stop();

        $this->assertEquals('stopped', $passengerVehicleBmw->getState());

        $passengerVehicleBmw->refuel($dieselGas);

        $this->assertEquals('refueled', $passengerVehicleBmw->getState());

        $passengerVehicleBmw->move();

        $this->assertEquals('moving', $passengerVehicleBmw->getState());
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $vehicleFactory = new VehicleFactory();

        $passengerVehicleBmw = $vehicleFactory->createVehicle('passenger', 'BMW');

        $dieselGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBmwStateMachine = new PassengerVehicleStateMachine($passengerVehicleBmw);

        $this->assertEquals('stopped', $passengerVehicleBmw->getState());

        $this->assertTrue($passengerVehicleBmwStateMachine->can('move'));

        $passengerVehicleBmw->move();

        $this->assertEquals('moving', $passengerVehicleBmw->getState());

        $passengerVehicleBmw->refuel($dieselGas);
    }
}