<?php

namespace Vehicle\Base\Water\State;

interface WaterVehicleStateInterface extends VehicleStateInterface
{
    public function swim();

    public function stop();
}