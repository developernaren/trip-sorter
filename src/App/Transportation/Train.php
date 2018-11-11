<?php

namespace App\Transportation;

use App\Transportation\Interfaces\Transportation;
use App\Transportation\Interfaces\HasSeatNumber;

class Train extends AbstractTransportation implements Transportation, HasSeatNumber
{

    private $seatNumber;
    protected $departure;
    protected $destination;
    private $trainNumber;

    /**
     * Train constructor.
     * @param $departure
     * @param $destination
     * @param $trainNumber
     * @param $seatNumber
     */
    public function __construct($departure, $destination, $trainNumber, $seatNumber)
    {
        $this->departure = $departure;
        $this->destination = $destination;
        $this->seatNumber = $seatNumber;
        $this->trainNumber = $trainNumber;
    }

    /**
     * get seat number for the train
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }

    /**
     * Returns travel statement for the train
     * @return string
     */
    public function getTravelStatement(): string
    {
        return sprintf('Take train %s from %s to %s. Sit in seat %s.',
            $this->trainNumber, $this->getDeparture(), $this->getDestination(), $this->getSeatNumber());
    }


}
