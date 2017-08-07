<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\CargoVehicleInterface;
use Vehicle\CargoVehicle;
use VehicleGas\VehicleGas;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleTest extends TestCase
{
    public function testCreateCargoVehicle(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz');
        $dieselGas = new VehicleGas('Diesel');

        $this->assertInstanceOf(
            CargoVehicleInterface::class,
            $cargoVehicleKamaz
        );
    }
}