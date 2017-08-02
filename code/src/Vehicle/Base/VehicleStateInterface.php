<?php

namespace Vehicle\Base;

interface VehicleStateInterface
{
    public function refuel();

    public function __toString(): string;
}