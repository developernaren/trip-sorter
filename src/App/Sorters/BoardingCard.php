<?php

namespace App\Sorters;

use App\Exceptions\HasInterruptionException;

class BoardingCard
{
    private $unsortedCards = [];
    private $sortedCards = [];

    /**
     * @param array $cards
     * @return array
     * @throws HasInterruptionException
     */
    public function sort( array $cards) : array
    {
        $this->unsortedCards = $cards;
        $departure = null;
        $destination = null;

        while (count($this->unsortedCards) > 0) {

            if (count($this->sortedCards) === 0) {

                $card = array_shift($this->unsortedCards);
                $departure = $card->getDeparture();
                $destination = $card->getDestination();
                array_push($this->sortedCards, $card);
            }

            $cardsBeforeSorting = count($this->unsortedCards);
            $currentCardCount = count($this->unsortedCards);

            for ($i = 0; $i < $currentCardCount; $i++) {
                $card = $this->unsortedCards[$i];

                if ($card->getDeparture() === $destination) {
                    $destination = $card->getDestination();

                    array_push($this->sortedCards, $card);
                    array_splice($this->unsortedCards, $i, 1);
                    $i--;
                    $currentCardCount--;
                    continue;
                }

                if ($card->getDestination() === $departure) {
                    $departure = $card->getDeparture();

                    array_unshift($this->sortedCards, $card);
                    array_splice($this->unsortedCards, $i, 1);
                    $i--;
                    $currentCardCount--;
                    continue;
                }
            }

            if ($cardsBeforeSorting > 0 && $cardsBeforeSorting === count($this->unsortedCards)) {
                throw new HasInterruptionException('This travel has interruption in between');
            }
        }

        return $this->sortedCards;
    }
}
