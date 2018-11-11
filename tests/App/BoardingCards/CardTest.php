<?php

namespace Tests\App\BoardingCards;

use App\BoardingCards\Card;
use App\Transportation\Bus;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{

    public function testTransportationDetailIsCorrectlySet()
    {
        $bus = new Bus('Kathmandu', 'Malaysia');
        $card = new Card($bus);

        $this->assertEquals('Kathmandu', $card->getDeparture());
        $this->assertEquals('Malaysia', $card->getDestination());

    }

}
