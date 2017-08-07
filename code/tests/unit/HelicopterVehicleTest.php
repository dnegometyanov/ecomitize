<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\HelicopterVehicleInterface;
use Vehicle\HelicopterVehicle;

/**
 * @covers HelicopterVehicle
 */
final class HelicopterVehicleTest extends TestCase
{
    public function testCreateHelicopterVehicle(): void
    {
        $passengerVehicleBmw = new HelicopterVehicle('Boeing CH-47 Chinook');

        $this->assertInstanceOf(
            HelicopterVehicleInterface::class,
            $passengerVehicleBmw
        );
    }
}