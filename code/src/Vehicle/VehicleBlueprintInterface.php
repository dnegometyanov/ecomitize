<?php

namespace Vehicle;

interface VehicleBlueprintInterface
{
    public function getActions(): array;

    public function getTransitions(): array;
}