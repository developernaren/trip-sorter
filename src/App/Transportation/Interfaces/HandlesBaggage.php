<?php

namespace App\Transportation\Interfaces;

interface HandlesBaggage
{
    public function dropBaggageAt(): string ;

    public function pickBaggageUpAt(): string ;
}
