<?php

namespace App\Transportation;

use App\Transportation\Interfaces\Transportation;
use App\Transportation\Interfaces\HasSeatNumber;
use App\Transportation\Interfaces\HasGate;
use App\Transportation\Interfaces\HandlesBaggage;

class Flight extends AbstractTransportation implements HasSeatNumber, HasGate, HandlesBaggage, Transportation
{
    private $baggageDrop;
    private $baggagePickup;
    private $gateNumber;
    private $seatNumber;
    protected $destination;
    protected $departure;
    protected $flightNumber;

    /**
     * Flight constructor.
     * @param $departure
     * @param $destination
     * @param $seatNumber
     * @param $flightNumber
     * @param $baggageDrop
     * @param $baggagePickup
     * @param $gateNumber
     */
    public function __construct($departure, $destination, $seatNumber, $flightNumber,$baggageDrop, $baggagePickup, $gateNumber)
    {
        $this->departure = $departure;
        $this->destination = $destination;
        $this->baggageDrop = $baggageDrop;
        $this->baggagePickup = $baggagePickup;
        $this->seatNumber = $seatNumber;
        $this->gateNumber = $gateNumber;
        $this->flightNumber = $flightNumber;
    }

    /**
     * Place to drop baggage at
     * @return string
     */
    public function dropBaggageAt(): string
    {
        return $this->baggageDrop;
    }

    /**
     * Returns place to pickup baggage from
     * @return string
     */
    public function pickBaggageUpAt(): string
    {
        return $this->baggagePickup;
    }

    /**
     * returns gate number for the flight
     * @return string
     */
    public function getGateNumber(): string
    {
        return $this->gateNumber;
    }

    /**
     * Returns seat number for the flight
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }

    /**
     * Returns travel statement for the Flight
     * @return string
     */
    public function getTravelStatement(): string
    {
        return sprintf(
            'From %s, take flight %s to %s. Gate %s, seat %s. Baggage drop at %s',
            $this->getDeparture(), $this->flightNumber, $this->getDestination(), $this->getGateNumber(), $this->getSeatNumber(), $this->dropBaggageAt());
    }

}
