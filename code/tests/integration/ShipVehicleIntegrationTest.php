<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\ShipVehicle;
use VehicleStateMachine\ShipVehicleStateMachine;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use Vehicle\VehicleFactory;
use VehicleGas\VehicleGas;

/**
 * @covers ShipVehicle
 */
final class ShipVehicleIntegrationTest extends TestCase
{
    public function testInitialVehicleStateSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $shipVehicleBoat = $vehicleFactory->createVehicle('ship', 'Boat');

        $this->assertEquals('Boat', $shipVehicleBoat->getName());

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoat);

        $this->assertInstanceOf(
            ShipVehicleStateMachine::class,
            $shipVehicleBoatStateMachine
        );

        $this->assertEquals(
            'stopped',
            $shipVehicleBoatStateMachine->getInitialState()
        );
    }

    public function testStatesTransitionsSuccess(): void
    {
        $vehicleFactory = new VehicleFactory();

        $shipVehicleBoat = $vehicleFactory->createVehicle('ship', 'Boat');

        $dieselGas = new VehicleGas('Gasoline A-92');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoat);

        $this->assertEquals('stopped', $shipVehicleBoat->getState());

        $this->assertTrue($shipVehicleBoatStateMachine->can('move'));

        $shipVehicleBoat->move();

        $this->assertEquals('moving', $shipVehicleBoat->getState());

        $shipVehicleBoat->swim();

        $this->assertEquals('swimming', $shipVehicleBoat->getState());

        $shipVehicleBoat->stop();

        $this->assertEquals('stopped', $shipVehicleBoat->getState());

        $shipVehicleBoat->refuel($dieselGas);

        $this->assertEquals('refueled', $shipVehicleBoat->getState());

        $shipVehicleBoat->move();

        $this->assertEquals('moving', $shipVehicleBoat->getState());
    }

    public function testRefuelOnMovingStateFailed(): void
    {
        $this->expectException(InvalidVehicleStateMachineTransitionException::class);

        $vehicleFactory = new VehicleFactory();

        $shipVehicleBoat = $vehicleFactory->createVehicle('ship', 'Boat');

        $dieselGas = new VehicleGas('Gasoline A-92');

        $shipVehicleBoatStateMachine = new ShipVehicleStateMachine($shipVehicleBoat);

        $this->assertEquals('stopped', $shipVehicleBoat->getState());

        $this->assertTrue($shipVehicleBoatStateMachine->can('move'));

        $shipVehicleBoat->move();

        $this->assertEquals('moving', $shipVehicleBoat->getState());

        $shipVehicleBoat->refuel($dieselGas);
    }
}