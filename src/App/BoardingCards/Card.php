<?php

namespace App\BoardingCards;

use App\Transportation\Interfaces\Transportation;

class Card
{

    private $transportation;

    /**
     * Card constructor.
     * @param Transportation $transportation
     */
    public function __construct(Transportation $transportation)
    {
        $this->transportation = $transportation;
    }

    /**
     * Returns departure of the card
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->transportation->getDeparture();
    }

    /**
     * Return Destination of the card
     * @return string
     */
    public function getDestination(): string
    {
        return $this->transportation->getDestination();
    }

    /**
     * Returrns the transportation assigned to this card
     * @return Transportation
     */
    public function getTransportation() : Transportation
    {
        return $this->transportation;
    }
}
