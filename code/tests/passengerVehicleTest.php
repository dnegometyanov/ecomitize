<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Vehicle\Passenger\PassengerVehicleInterface;
use Vehicle\Passenger\PassengerVehicle;

/**
 * @covers Email
 */
final class PassengerVehicleTest extends TestCase
{
    public function testIsInstanceOfInter(): void
    {
        $this->assertInstanceOf(
            PassengerVehicleInterface::class,
            new PassengerVehicle('BMW')
        );
    }
}


