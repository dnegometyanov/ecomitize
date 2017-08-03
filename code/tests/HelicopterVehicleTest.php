<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\Helicopter\HelicopterVehicleInterface;
use Vehicle\Helicopter\HelicopterVehicle;
use Vehicle\Helicopter\State;
use VehicleGas\VehicleGas;

/**
 * @covers HelicopterVehicle
 */
final class HelicopterVehicleTest extends TestCase
{
    public function testCreateHelicopterVehicle(): void
    {
        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());

        $this->assertInstanceOf(
            HelicopterVehicleInterface::class,
            $helicopterVehicleBoeing
        );

        $this->assertInstanceof(
            State\HelicopterVehicleLandingState::class,
            $helicopterVehicleBoeing->getState()
        );
    }

    public function testDriveVehicleSuccess(): void
    {
        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());
        $kereseneGas = new VehicleGas('Kerosene');

        $helicopterVehicleBoeing->takeOff();

        $this->assertInstanceof(
            State\HelicopterVehicleTakeOffState::class,
            $helicopterVehicleBoeing->getState()
        );

        $helicopterVehicleBoeing->fly();

        $this->assertInstanceof(
            State\HelicopterVehicleFlyingState::class,
            $helicopterVehicleBoeing->getState()
        );

        $helicopterVehicleBoeing->landing();

        $this->assertInstanceof(
            State\HelicopterVehicleLandingState::class,
            $helicopterVehicleBoeing->getState()
        );

        $helicopterVehicleBoeing->refuel($kereseneGas);

        $this->assertInstanceof(
            State\HelicopterVehicleRefuelState::class,
            $helicopterVehicleBoeing->getState()
        );

        $helicopterVehicleBoeing->takeOff();

        $this->assertInstanceof(
            State\HelicopterVehicleTakeOffState::class,
            $helicopterVehicleBoeing->getState()
        );
    }

    public function testLandingOnLandingVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());

        $helicopterVehicleBoeing->landing();
    }

    public function testTakeOffOnTakeOffVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->takeOff();
    }

    public function testFlyOnFlyVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->fly();

        $helicopterVehicleBoeing->fly();
    }

    public function testRefuelOnTakeOffVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());
        $kereseneGas = new VehicleGas('Kerosene');

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->refuel($kereseneGas);
    }

    public function testRefuelOnFlyVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());
        $kereseneGas = new VehicleGas('Kerosene');

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->fly();

        $helicopterVehicleBoeing->refuel($kereseneGas);
    }

    public function testRefuelOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());
        $kereseneGas = new VehicleGas('Kerosene');

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->fly();

        $helicopterVehicleBoeing->refuel($kereseneGas);

        $helicopterVehicleBoeing->refuel($kereseneGas);
    }

    public function testTakeOffOnFlyVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());

        $helicopterVehicleBoeing->takeOff();

        $helicopterVehicleBoeing->fly();

        $helicopterVehicleBoeing->takeOff();
    }

    public function testLandingOnRefuelVehicleFail(): void
    {
        $this->expectException(\Vehicle\Exception\VehicleIllegalStateTransitionException::class);

        $helicopterVehicleBoeing = new HelicopterVehicle('Boeing CH-47 Chinook', new State\HelicopterVehicleLandingState());
        $kereseneGas = new VehicleGas('Kerosene');

        $helicopterVehicleBoeing->refuel($kereseneGas);

        $helicopterVehicleBoeing->landing();
    }
}


