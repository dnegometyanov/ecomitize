<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\Passenger\PassengerVehicleInterface;
use Vehicle\Passenger\PassengerVehicle;
use Vehicle\Passenger\State;
use Vehicle\Gas\VehicleGas;

/**
 * @covers PassengerVehicle
 */
final class PassengerVehicleTest extends TestCase
{
    public function testCreatePassengerVehicle(): void
    {
        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());

        $this->assertInstanceOf(
            PassengerVehicleInterface::class,
            $passengerVehicleBMW
        );

        $this->assertInstanceof(
            State\PassengerVehicleStoppedState::class,
            $passengerVehicleBMW->getState()
        );
    }

    public function testDriveVehicleSuccess(): void
    {
        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());
        $gasolineGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBMW->move();

        $this->assertInstanceof(
            State\PassengerVehicleMovingState::class,
            $passengerVehicleBMW->getState()
        );

        $passengerVehicleBMW->musicOn();

        $this->assertInstanceof(
            State\PassengerVehicleMovingMusicOnState::class,
            $passengerVehicleBMW->getState()
        );

        $passengerVehicleBMW->stop();

        $this->assertInstanceof(
            State\PassengerVehicleStoppedState::class,
            $passengerVehicleBMW->getState()
        );

        $passengerVehicleBMW->refuel($gasolineGas);

        $this->assertInstanceof(
            State\PassengerVehicleRefuelState::class,
            $passengerVehicleBMW->getState()
        );

        $passengerVehicleBMW->move();

        $this->assertInstanceof(
            State\PassengerVehicleMovingState::class,
            $passengerVehicleBMW->getState()
        );
    }

    public function testMusicOnStoppedVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());

        $passengerVehicleBMW->musicOn();
    }

    public function testStopOnStoppedVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());

        $passengerVehicleBMW->stop();
    }

    public function testMoveOnMoveVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());

        $passengerVehicleBMW->move();

        $passengerVehicleBMW->move();
    }

    public function testRefuelOnMoveVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());
        $gasolineGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBMW->move();

        $passengerVehicleBMW->refuel($gasolineGas);
    }

    public function testRefuelOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());
        $gasolineGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBMW->refuel($gasolineGas);

        $passengerVehicleBMW->refuel($gasolineGas);
    }

    public function testStopOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());
        $gasolineGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBMW->refuel($gasolineGas);

        $passengerVehicleBMW->stop();
    }

    public function testMusicOnOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $passengerVehicleBMW = new PassengerVehicle('BMW', new State\PassengerVehicleStoppedState());
        $gasolineGas = new VehicleGas('Gasoline A-98');

        $passengerVehicleBMW->refuel($gasolineGas);

        $passengerVehicleBMW->musicOn();
    }
}


