<?php

namespace Vehicle\Observer;

class VehicleStateObserver implements \SplObserver
{
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        echo sprintf("%s \n", $subject);
    }
}