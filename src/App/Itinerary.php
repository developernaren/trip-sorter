<?php

namespace App;

use App\Exceptions\NoBoardingCardException;

class Itinerary
{
    private $travel;
    private $statement = '';

    /**
     * Itinerary constructor.
     * @param Travel $travel
     */
    function __construct(Travel $travel)
    {
        $this->travel = $travel;
    }

    /**
     * @return string
     * @throws Exceptions\HasInterruptionException
     * @throws NoBoardingCardException
     */
    public function generate() : string
    {
        $cards = $this->travel->getCards();

        if(count($cards) < 1){
            throw new NoBoardingCardException('There are no boarding card in this travel');
        }

        foreach ($cards as $key => $card){
            $this->statement .= ($key + 1) . '. ' . $card->getTransportation()->getTravelStatement() . PHP_EOL;
        }

        $this->statement .= ($key + 2) . '. ' . 'You have arrived at your final destination.';

        return $this->statement;
    }
}
