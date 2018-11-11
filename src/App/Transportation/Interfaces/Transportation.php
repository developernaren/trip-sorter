<?php

namespace App\Transportation\Interfaces;

interface Transportation
{
    public function getDeparture(): string ;

    public function getDestination(): string ;

    public function getTravelStatement(): string ;

}
