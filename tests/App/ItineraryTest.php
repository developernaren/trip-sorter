<?php

namespace Tests\App;

use App\Exceptions\NoBoardingCardException;
use App\Itinerary;
use App\Transportation\Bus;
use App\Transportation\Flight;
use App\Transportation\Train;
use App\Travel;
use PHPUnit\Framework\TestCase;

class ItineraryTest extends TestCase
{

    public function testItineraryIsCorrectlyGenerated()
    {


        $cards = [];
        $ktmToIndia = new Flight('KTM', 'DEL', 'F16', 'A320', 'Counter 6', 'Counter 7', 'F17');
        $ktmToIndCard = new \App\BoardingCards\Card($ktmToIndia);
        array_push($cards, $ktmToIndCard);

        $indToSng = new Flight('DEL', 'SNG', 'F16', 'A320', 'Counter 6', 'Counter 7', 'F17');
        $indToSngCard = new \App\BoardingCards\Card($indToSng);
        array_push($cards, $indToSngCard);

        $sngToFrance = new Flight('SNG', 'FRN', 'F16', 'A320', 'Counter 6', 'Counter 7', 'F17');
        $sngToFranceCard = new \App\BoardingCards\Card($sngToFrance);
        array_push($cards, $sngToFranceCard);

        $frToBR = new Flight('FRN', 'BR', 'F16', 'A320', 'Counter 6', 'Counter 7', 'F17');
        $frToBRCard = new \App\BoardingCards\Card($frToBR);
        array_push($cards, $frToBRCard);

        $brToGer = new Flight('BR', 'GER', 'F16', 'A320', 'Counter 6', 'Counter 7', 'F17');
        $brToGerCard = new \App\BoardingCards\Card($brToGer);
        array_push($cards, $brToGerCard);

        $gerToApr = new Bus('GER', 'APR', 'B12');
        $gerToAprCard = new \App\BoardingCards\Card($gerToApr);
        array_push($cards, $gerToAprCard);

        $aprToCER = new Train('APR', 'CER', 'SK44', 'F23');
        $aprToCERCard = new \App\BoardingCards\Card($aprToCER);
        array_push($cards, $aprToCERCard);


        $travel = Travel::createFromBoardingCards($cards);

        $itinerary = new \App\Itinerary($travel);

        $this->assertSame($itinerary->generate(), $this->getItinerary());
    }

    public function getItinerary(): string
    {
        return '1. From KTM, take flight A320 to DEL. Gate F17, seat F16. Baggage drop at Counter 6
2. From DEL, take flight A320 to SNG. Gate F17, seat F16. Baggage drop at Counter 6
3. From SNG, take flight A320 to FRN. Gate F17, seat F16. Baggage drop at Counter 6
4. From FRN, take flight A320 to BR. Gate F17, seat F16. Baggage drop at Counter 6
5. From BR, take flight A320 to GER. Gate F17, seat F16. Baggage drop at Counter 6
6. Take the bus from GER to APR. Seat B12.
7. Take train SK44 from APR to CER. Sit in seat F23.
8. You have arrived at your final destination.';
    }

    public function testItineraryCannotBeGeneratedForTravelWithNoCards()
    {
        $travel = Travel::createFromBoardingCards([]);
        $itinerary = new Itinerary($travel);

        $this->expectException(NoBoardingCardException::class);
        $itinerary->generate();
    }
}
