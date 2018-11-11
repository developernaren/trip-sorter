<?php

namespace Tests\App\Transportation;

use App\Transportation\Flight;
use PHPUnit\Framework\TestCase;

class FlightTest extends TestCase
{

    public function testTravelStatementIsCorrectlyReturned()
    {

        $flight = new Flight('Kathmandu', 'Delhi', 'F16', 'A320','Counter 6', 'Counter 7', 'F17');

        $this->assertSame($flight->getTravelStatement(), 'From Kathmandu, take flight A320 to Delhi. Gate F17, seat F16. Baggage drop at Counter 6');
    }
}
