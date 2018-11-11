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
        $this->travel = new Travel();
    }


    public function testABoardingCardCanBeAddedToTravel()
    {
        $flight = new Flight('KTM', 'DEL', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $card = new Card($flight);
        $this->travel->addBoardingCard($card);
        $this->assertCount(1, $this->travel->getCards());
    }

    public function testMultipleBoardingCardCanBeAddedAtOnce()
    {

        $cards = [];
        $flight = new Flight('KTM', 'DEL', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $cards[] = new Card($flight);

        $flight1 = new Flight('DEL', 'NYC', 'A32', 'A34', 'Counter 4', 'Counter 5', 'A32');
        $cards[] = new Card($flight1);

        $this->travel->addBoardingCards($cards);
        $this->assertCount(2, $this->travel->getCards());
    }
}
