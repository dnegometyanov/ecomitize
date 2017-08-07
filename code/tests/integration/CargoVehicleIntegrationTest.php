<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\CargoVehicle;
use VehicleStateMachine\CargoVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use Vehicle\VehicleFactory;
use VehicleGas\VehicleGas;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleIntegrationTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $cargoVehicleKamaz = $vehicleFactory->createVehicle('cargo', 'Kamaz');

        $this->assertEquals('Kamaz', $cargoVehicleKamaz->getName());

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamaz);

        $this->assertInstanceOf(
            CargoVehicleStateMachine::class,
            $cargoVehicleKamazStateMachine
        );

        $this->assertEquals(
            'stopped',
            $cargoVehicleKamazStateMachine->getInitialState()
        );
    }

    public function testStatesTransitionsSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $cargoVehicleKamaz = $vehicleFactory->createVehicle('cargo', 'Kamaz');

        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamaz);

        $this->assertEquals('stopped', $cargoVehicleKamaz->getState());

        $this->assertTrue($cargoVehicleKamazStateMachine->can('move'));

        $cargoVehicleKamaz->move();

        $this->assertEquals('moving', $cargoVehicleKamaz->getState());

        $cargoVehicleKamaz->stop();

        $this->assertEquals('stopped', $cargoVehicleKamaz->getState());

        $cargoVehicleKamaz->emptyLoads();

        $this->assertEquals('emptyLoads', $cargoVehicleKamaz->getState());

        $cargoVehicleKamaz->refuel($dieselGas);

        $this->assertEquals('refueled', $cargoVehicleKamaz->getState());

        $cargoVehicleKamaz->move();

        $this->assertEquals('moving', $cargoVehicleKamaz->getState());
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $vehicleFactory = new VehicleFactory();

        $cargoVehicleKamaz = $vehicleFactory->createVehicle('cargo', 'Kamaz');

        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamazStateMachine = new CargoVehicleStateMachine($cargoVehicleKamaz);

        $this->assertEquals('stopped', $cargoVehicleKamaz->getState());

        $this->assertTrue($cargoVehicleKamazStateMachine->can('move'));

        $cargoVehicleKamaz->move();

        $this->assertEquals('moving', $cargoVehicleKamaz->getState());

        $cargoVehicleKamaz->refuel($dieselGas);
    }
}