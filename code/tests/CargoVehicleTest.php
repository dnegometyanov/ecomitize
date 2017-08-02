<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\Cargo\CargoVehicleInterface;
use Vehicle\Cargo\CargoVehicle;
use \Vehicle\Cargo\State;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleTest extends TestCase
{
    public function testCreateCargoVehicle(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $this->assertInstanceOf(
            CargoVehicleInterface::class,
            $cargoVehicleKamaz
        );

        $this->assertInstanceof(
            State\CargoVehicleStoppedState::class,
            $cargoVehicleKamaz->getState()
        );
    }

    public function testDriveVehicleSuccess(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->move();

        $this->assertInstanceof(
            State\CargoVehicleMovingState::class,
            $cargoVehicleKamaz->getState()
        );

        $cargoVehicleKamaz->stop();

        $this->assertInstanceof(
            State\CargoVehicleStoppedState::class,
            $cargoVehicleKamaz->getState()
        );

        $cargoVehicleKamaz->emptyLoads();

        $this->assertInstanceof(
            State\CargoVehicleEmptyLoadsState::class,
            $cargoVehicleKamaz->getState()
        );

        $cargoVehicleKamaz->refuel();

        $this->assertInstanceof(
            State\CargoVehicleRefuelState::class,
            $cargoVehicleKamaz->getState()
        );

        $cargoVehicleKamaz->move();

        $this->assertInstanceof(
            State\CargoVehicleMovingState::class,
            $cargoVehicleKamaz->getState()
        );
    }

    public function tesEmptyLoadsOnRefuelVehicleSuccess(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->refuel();

        $cargoVehicleKamaz->emptyLoads();

        $this->assertInstanceof(
            State\CargoVehicleEmptyLoadsState::class,
            $cargoVehicleKamaz->getState()
        );
    }

    public function testEmptyLoadsMovingVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->move();

        $cargoVehicleKamaz->emptyLoads();
    }

    public function testStopOnStoppedVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->stop();
    }

    public function testMoveOnMoveVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->move();

        $cargoVehicleKamaz->move();
    }

    public function testRefuelOnMoveVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->move();

        $cargoVehicleKamaz->refuel();
    }

    public function testRefuelOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->refuel();

        $cargoVehicleKamaz->refuel();
    }

    public function testStopOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());

        $cargoVehicleKamaz->refuel();

        $cargoVehicleKamaz->stop();
    }
}