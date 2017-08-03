<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\Cargo\CargoVehicleInterface;
use Vehicle\Cargo\CargoVehicle;
use Vehicle\Cargo\State;
use VehicleGas\VehicleGas;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleTest extends TestCase
{
    public function testCreateCargoVehicle(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());
        $dieselGas = new VehicleGas('Diesel');

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
        $dieselGas = new VehicleGas('Diesel');

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

        $cargoVehicleKamaz->refuel($dieselGas);

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
        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamaz->refuel($dieselGas);

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
        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamaz->move();

        $cargoVehicleKamaz->refuel($dieselGas);
    }

    public function testRefuelOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());
        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamaz->refuel($dieselGas);

        $cargoVehicleKamaz->refuel($dieselGas);
    }

    public function testStopOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $cargoVehicleKamaz = new CargoVehicle('Kamaz', new State\CargoVehicleStoppedState());
        $dieselGas = new VehicleGas('Diesel');

        $cargoVehicleKamaz->refuel($dieselGas);

        $cargoVehicleKamaz->stop();
    }
}