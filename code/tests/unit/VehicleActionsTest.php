<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Vehicle\PassengerVehicle;
use VehicleStateMachine\Exception\InvalidVehicleStateMachineTransitionException;
use VehicleStateMachine\PassengerVehicleStateMachine;

/**
 * @covers PassengerVehicle
 */
final class VehicleActionsTest extends TestCase
{

    public function testEmptyLoadsActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $emptyLoadsAction = new Vehicle\Action\EmptyLoadsAction();
        $emptyLoadsAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\EmptyLoadsAction::class,
            $emptyLoadsAction
        );

        $this->assertEquals(
            'SomeMockVehicle empty loads.',
            $emptyLoadsAction->do()
        );
    }

    public function testFlyActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $flyAction = new Vehicle\Action\FlyAction();
        $flyAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\FlyAction::class,
            $flyAction
        );

        $this->assertEquals(
            'SomeMockVehicle flying.',
            $flyAction->do()
        );
    }

    public function testLandingActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $landingAction = new Vehicle\Action\LandingAction();
        $landingAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\LandingAction::class,
            $landingAction
        );

        $this->assertEquals(
            'SomeMockVehicle landed.',
            $landingAction->do()
        );
    }

    public function testMoveActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $moveAction = new Vehicle\Action\MoveAction();
        $moveAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\MoveAction::class,
            $moveAction
        );

        $this->assertEquals(
            'SomeMockVehicle moving.',
            $moveAction->do()
        );
    }

    public function testMusicOnActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $musicOnAction = new Vehicle\Action\MusicOnAction();
        $musicOnAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\MusicOnAction::class,
            $musicOnAction
        );

        $this->assertEquals(
            'SomeMockVehicle music on.',
            $musicOnAction->do()
        );
    }

    public function testRefuelActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $refuelAction = new Vehicle\Action\RefuelAction();
        $refuelAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\RefuelAction::class,
            $refuelAction
        );

        $this->assertEquals(
            'SomeMockVehicle refueled.',
            $refuelAction->do()
        );
    }

    public function testStopActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $stopAction = new Vehicle\Action\StopAction();
        $stopAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\StopAction::class,
            $stopAction
        );

        $this->assertEquals(
            'SomeMockVehicle stopped.',
            $stopAction->do()
        );
    }

    public function testSwimActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $swimAction = new Vehicle\Action\SwimAction();
        $swimAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\SwimAction::class,
            $swimAction
        );

        $this->assertEquals(
            'SomeMockVehicle swimming.',
            $swimAction->do()
        );
    }

    public function testTakeOffActionSuccess(): void
    {
        $vehicleMock = $this->createMock('Vehicle\Vehicle');
        $vehicleMock
            ->method('getName')
            ->willReturn('SomeMockVehicle');

        $swimAction = new Vehicle\Action\TakeOffAction();
        $swimAction->setVehicle($vehicleMock);

        $this->assertInstanceOf(
            \Vehicle\Action\TakeOffAction::class,
            $swimAction
        );

        $this->assertEquals(
            'SomeMockVehicle took off.',
            $swimAction->do()
        );
    }
}