<?php

namespace Vehicle\Base;

interface VehicleInterface
{
    public function getName(): string;

    public function getState(): VehicleStateInterface;

    public function refuel();
}