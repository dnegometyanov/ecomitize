<?php

namespace Vehicle\Base\Land\State;

use Vehicle\Base\Water\State\AbstractWaterVehicleState;
use Vehicle\Cargo\State\ShipVehicleStateInterface;

abstract class AbstractShipVehicleState extends AbstractWaterVehicleState implements ShipVehicleStateInterface
{
}