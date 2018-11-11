<?php

namespace App\Transportation;

use App\Transportation\Interfaces\Transportation;
use App\Transportation\Interfaces\HasSeatNumber;

class Bus extends AbstractTransportation implements Transportation, HasSeatNumber
{
    private $seatNumber;
    protected $departure;
    protected $destination;
    protected $name = 'Bus';

    /**
     * Bus constructor.
     * @param $departure
     * @param $destination
     * @param null $seatNumber
     */
    public function __construct($departure, $destination, $seatNumber = null)
    {
        $this->departure = $departure;
        $this->destination = $destination;
        $this->seatNumber = $seatNumber;
    }

    /**
     * Returns seat number for the bus
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }

    /**
     * Returns travel statement for the bus
     * @return string
     */
    public function getTravelStatement(): string
    {
        $statement = 'Take the bus from ' . $this->departure .' to '. $this->destination . '. ';

        if($this->seatNumber){
            $statement .= 'Seat ' . $this->seatNumber. '.';
        }

        if(!$this->seatNumber){
            $statement .= 'No seat assignment.';
        }

        return $statement;

    }


}
