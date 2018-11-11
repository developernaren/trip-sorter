<?php

namespace App;

use App\BoardingCards\Card;
use App\Sorters\BoardingCard;

class Travel
{
    private $boardingCards = [];
    private $sorter;
    private $sortedCards = [];

    public function __construct()
    {
        $this->sorter = new BoardingCard();
    }

    /**
     * Adds 1 boarding cards to travel
     * @param Card $boardingCard
     */
    public function addBoardingCard( Card $boardingCard )
    {
        array_push($this->boardingCards, $boardingCard);
    }

    /**
     * Set multiple boarding cards
     * Accepts array of App\BoardingCards\Card objects
     * @param array $boardingCards
     *
     */
    public function addBoardingCards( $boardingCards = [])
    {
        foreach ($boardingCards as $boardingCard){
            $this->addBoardingCard($boardingCard);
        }
    }

    /**
     * Returns ordered list of cards.
     * @return array
     * @throws Exceptions\HasInterruptionException
     */
    public function getCards(): array
    {
        if(count($this->sortedCards)){
            return $this->sortedCards;
        }
        return $this->sortedCards = $this->sorter->sort($this->boardingCards);
    }

}
