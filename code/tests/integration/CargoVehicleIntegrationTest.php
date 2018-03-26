<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Vehicle\VehicleFactory;

/**
 * @covers CargoVehicle
 */
final class VehicleIntegrationTest extends TestCase
{
    public function testVehicleWithoutBlueprintAndWithoutTransitions(): void
    {
        $vehicleFactory = new VehicleFactory();

        // On the fly, without blueprint
        $kamazVehicle = $vehicleFactory->createVehicle(
            'Kamaz',
            [
                'stop',
                'move',
                'empty_loads',
                'refuel'
            ]
        );

        $this->assertInstanceOf(
            \Vehicle\Vehicle::class,
            $kamazVehicle
        );

        $kamazVehicle
            ->move()
            ->stop()
            ->emptyLoads()
            ->refuel();

        $this->assertEquals(
            'Kamaz moving. Kamaz stopped. Kamaz empty loads. Kamaz refueled.',
            trim(preg_replace('/\s+/', ' ', $kamazVehicle->getResult()))
        );
    }

    public function testVehicleWithBlueprintAndWithoutTransitions(): void
    {
        $vehicleFactory = new VehicleFactory();

        // Creating blueprint for passenger car
        $passengerCarBlueprint = new \Vehicle\VehicleBlueprint(
            [
                'stop',
                'move',
                'music_on',
                'refuel'
            ]
        );

        $bmwVehicle = $vehicleFactory->createVehicleFromBlueprint('BMW', $passengerCarBlueprint);

        $this->assertInstanceOf(
            \Vehicle\Vehicle::class,
            $bmwVehicle
        );

        $bmwVehicle
            ->move()
            ->stop()
            ->musicOn()
            ->refuel();

        $this->assertEquals(
            'BMW moving. BMW stopped. BMW music on. BMW refueled.',
            trim(preg_replace('/\s+/', ' ', $bmwVehicle->getResult()))
        );
    }

    public function testVehicleWithoutBlueprintAndWithTransitions(): void
    {
        $vehicleFactory = new VehicleFactory();

        // On the fly, without blueprint
        $boatVehicle = $vehicleFactory->createVehicle(
            'Boat',
            [
                'stop',
                'swim',
                'refuel'
            ],
            [
                'stopped' => ['swimming', 'refueled'],
                'swimming' => ['stopped'],
                'refueled' => ['swimming'],
            ]
        );

        $this->assertInstanceOf(
            \Vehicle\Vehicle::class,
            $boatVehicle
        );

        $boatVehicle
            ->swim()
            ->stop()
            ->refuel();

        $this->assertEquals(
            'Boat swimming. Boat stopped. Boat refueled.',
            trim(preg_replace('/\s+/', ' ', $boatVehicle->getResult()))
        );
    }


    public function testVehicleWithBlueprintAndWithTransitions(): void
    {
        $vehicleFactory = new VehicleFactory();

        // Creating blueprint for plane
        $planeBlueprint = new \Vehicle\VehicleBlueprint(
            [
                'landing',
                'take_off',
                'fly',
                'refuel'
            ],
            [
                'landed' => ['took_off', 'refueled'],
                'took_off' => ['flying'],
                'flying' => ['landed'],
                'refueled' => ['took_off'],
            ]
        );

        $boeingVehicle = $vehicleFactory->createVehicleFromBlueprint('Boeing CH-47 Chinook', $planeBlueprint);

        $this->assertInstanceOf(
            \Vehicle\Vehicle::class,
            $boeingVehicle
        );

        $boeingVehicle
            ->takeOff()
            ->fly()
            ->landing()
            ->refuel();

        $this->assertEquals(
            'Boeing CH-47 Chinook took off. Boeing CH-47 Chinook flying. Boeing CH-47 Chinook landed. Boeing CH-47 Chinook refueled.',
            trim(preg_replace('/\s+/', ' ', $boeingVehicle->getResult()))
        );
    }


}