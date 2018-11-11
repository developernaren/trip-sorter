<?php

namespace App\Transportation;


class AbstractTransportation
{
    protected $departure;
    protected $destination;
    protected $name;

    public function getDeparture(): string
    {
        return $this->departure;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

}
