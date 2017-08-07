<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Vehicle\PassengerVehicleInterface;
use Vehicle\PassengerVehicle;

/**
 * @covers PassengerVehicle
 */
final class PassengerVehicleTest extends TestCase
{
    public function testCreatePassengerVehicle(): void
    {
        $passengerVehicleBmw = new PassengerVehicle('BMW');

        $this->assertInstanceOf(
            PassengerVehicleInterface::class,
            $passengerVehicleBmw
        );
    }
}