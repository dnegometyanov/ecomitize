<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\CargoVehicleInterface;
use Vehicle\CargoVehicle;

/**
 * @covers CargoVehicle
 */
final class CargoVehicleTest extends TestCase
{
    public function testCreateCargoVehicle(): void
    {
        $cargoVehicleKamaz = new CargoVehicle('Kamaz');

        $this->assertInstanceOf(
            CargoVehicleInterface::class,
            $cargoVehicleKamaz
        );
    }
}