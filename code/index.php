<?php

use Vehicle\VehicleFactory;

require('./vendor/autoload.php');

$vehicleFactory = new VehicleFactory();

try {
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

    // Re-use blueprint
    $hondaVehicle = $vehicleFactory->createVehicleFromBlueprint('Honda', $passengerCarBlueprint);


    // On the fly, without blueprint, with transitions map
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

    // Creating blueprint with transition map for plane
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

    // Execute actions

    $kamazVehicle
        ->move()
        ->stop()
        ->emptyLoads()
        ->refuel();

    echo $kamazVehicle->getResult();

    $bmwVehicle
        ->move()
        ->stop()
        ->musicOn()
        ->refuel();

    echo $bmwVehicle->getResult();

    $hondaVehicle
        ->move()
        ->stop()
        ->musicOn()
        ->refuel();

    echo $hondaVehicle->getResult();

    $boatVehicle
        ->swim()
        ->stop()
        ->refuel();

    echo $boatVehicle->getResult();

    $boeingVehicle
        ->takeOff()
        ->fly()
        ->landing()
        ->refuel();

    echo $boeingVehicle->getResult();

} catch (\Exception $e) {
    echo $e->getMessage();
}