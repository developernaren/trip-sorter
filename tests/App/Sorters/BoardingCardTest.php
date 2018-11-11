<?php

namespace Tests\App\Sorters;

use App\Exceptions\HasInterruptionException;
use App\Sorters\BoardingCard;
use PHPUnit\Framework\TestCase;
use App\Transportation\Flight;
use App\BoardingCards\Card;

class BoardingCardTest extends TestCase
{

    private $sorter;
    public function setUp()
    {
        parent::setUp();
        $this->sorter = new BoardingCard();
    }

    public function testCardsAreCorrectlySorted()
    {
        $cards = [];
        $ktmToDelhi = new Flight('Kathmandu', 'Delhi', 'F16', 'A320','Counter 6', 'Counter 7', 'F17');
        $ktmToDelhiCard = new Card($ktmToDelhi);
        $cards[] = $ktmToDelhiCard;

        $dubaiToSingapore = new Flight('Dubai', 'Singapore', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
        $dubaiToSingaporeCard = new Card($dubaiToSingapore);
        $cards[] = $dubaiToSingaporeCard;

        $delhiToDubai = new Flight('Delhi', 'Dubai', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
        $delhiToDubaiCard = new Card($delhiToDubai);
        $cards[] = $delhiToDubaiCard;

        $orderedCards = $this->sorter->sort($cards);

        $this->assertCount(3,$orderedCards);
        $this->assertSame($orderedCards[0], $ktmToDelhiCard);
        $this->assertSame($orderedCards[1], $delhiToDubaiCard);
        $this->assertSame($orderedCards[2], $dubaiToSingaporeCard);

    }

    public function testTravelWithInterruptionsThrowsException()
    {
        $cards = [];
        $ktmToDelhi = new Flight('Kathmandu', 'Delhi', 'F16', 'A320','Counter 6', 'Counter 7', 'F17');
        $ktmToDelhiCard = new Card($ktmToDelhi);
        $cards[] = $ktmToDelhiCard;

        $nepalToSingapore = new Flight('Nepal', 'Singapore', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
        $nepalToSingaporeCard = new Card($nepalToSingapore);
        $cards[] = $nepalToSingaporeCard;

        $delhiToDubai = new Flight('Delhi', 'Dubai', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
        $delhiToDubaiCard = new Card($delhiToDubai);
        $cards[] = $delhiToDubaiCard;

        $this->expectException(HasInterruptionException::class);
        $this->sorter->sort($cards);
    }

}
