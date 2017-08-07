<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\ShipVehicleInterface;
use Vehicle\ShipVehicle;

/**
 * @covers ShipVehicle
 */
final class ShipVehicleTest extends TestCase
{
    public function testCreateShipVehicle(): void
    {
        $shipVehicleBoat = new ShipVehicle('Boat');

        $this->assertInstanceOf(
            ShipVehicleInterface::class,
            $shipVehicleBoat
        );
    }
}