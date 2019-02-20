<?php

namespace Tests\App;

use App\BoardingCards\Card;
use App\Transportation\Flight;
use App\Travel;
use PHPUnit\Framework\TestCase;

class TravelTest extends TestCase
{

    private $travel;

    public function setUp()
    {
        parent::setUp();
    }


    public function testABoardingCardCanBeAddedToTravel()
    {
        $flight = new Flight('KTM', 'DEL', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $card = new Card($flight);

        $travel = Travel::createFromBoardingCard($card);
        $this->assertCount(1, $travel->getCards());
    }

    public function testMultipleBoardingCardCanBeAddedAtOnce()
    {

        $cards = [];
        $flight = new Flight('KTM', 'DEL', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $cards[] = new Card($flight);

        $flight1 = new Flight('DEL', 'NYC', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $cards[] = new Card($flight1);

        $travel = Travel::createFromBoardingCards($cards);
        $this->assertCount(2, $travel->getCards());
    }
}
