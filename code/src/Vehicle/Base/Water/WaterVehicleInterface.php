<?php

namespace Vehicle\Base\Water;

interface WaterVehicleInterface extends VehicleInterface
{
    public function swim();

    public function stop();
}