<?php

namespace App;

use App\BoardingCards\Card;
use App\Sorters\BoardingCard;

class Travel
{
    private $boardingCards = [];
    private $sorter;
    private $sortedCards = [];


    private function __construct($boardingCard)
    {
        $this->sorter = new BoardingCard();

        if($boardingCard instanceof Card){
            $this->addBoardingCard($boardingCard);
        }

        if(is_array($boardingCard)){
            $this->addBoardingCards($boardingCard);
        }
    }

    public static function createFromBoardingCard(Card $card)
    {
        return new Travel($card);
    }

    public static function createFromBoardingCards(array $cards)
    {
        return new Travel($cards);
    }

    /**
     * Adds 1 boarding cards to travel
     * @param Card $boardingCard
     */
    private function addBoardingCard( Card $boardingCard )
    {
        array_push($this->boardingCards, $boardingCard);
    }

    /**
     * Set multiple boarding cards
     * Accepts array of App\BoardingCards\Card objects
     * @param array $boardingCards
     *
     */
    private function addBoardingCards( $boardingCards = [])
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
