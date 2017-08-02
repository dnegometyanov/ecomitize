<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\Ship\ShipVehicleInterface;
use Vehicle\Ship\ShipVehicle;
use \Vehicle\Ship\State;

/**
 * @covers ShipVehicle
 */
final class ShipVehicleTest extends TestCase
{
    public function testCreateShipVehicle(): void
    {
        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $this->assertInstanceOf(
            ShipVehicleInterface::class,
            $passengerVehicleBoat
        );

        $this->assertInstanceof(
            State\ShipVehicleStoppedState::class,
            $passengerVehicleBoat->getState()
        );
    }

    public function testDriveVehicleSuccess(): void
    {
        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->swim();

        $this->assertInstanceof(
            State\ShipVehicleSwimmingState::class,
            $passengerVehicleBoat->getState()
        );

        $passengerVehicleBoat->stop();

        $this->assertInstanceof(
            State\ShipVehicleStoppedState::class,
            $passengerVehicleBoat->getState()
        );

        $passengerVehicleBoat->refuel();

        $this->assertInstanceof(
            State\ShipVehicleRefuelState::class,
            $passengerVehicleBoat->getState()
        );

        $passengerVehicleBoat->swim();

        $this->assertInstanceof(
            State\ShipVehicleSwimmingState::class,
            $passengerVehicleBoat->getState()
        );
    }

    public function testStopOnStoppedVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->stop();
    }

    public function testSwimOnSwimVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->swim();

        $passengerVehicleBoat->swim();
    }

    public function testRefuelOnSwimVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->swim();

        $passengerVehicleBoat->refuel();
    }

    public function testRefuelOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->refuel();

        $passengerVehicleBoat->refuel();
    }

    public function testStopOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBoat = new ShipVehicle('Boat', new State\ShipVehicleStoppedState());

        $passengerVehicleBoat->refuel();

        $passengerVehicleBoat->stop();
    }
}


