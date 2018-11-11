<?php

namespace Tests\App\Transportation;

use PHPUnit\Framework\TestCase;
use App\Transportation\Train;

class TrainTest extends TestCase
{

    public function testTravelStatementIsCorrectlyReturned()
    {
        $train = new Train('APR', 'CER', 'SK44', 'F23');
        $this->assertSame($train->getTravelStatement(), 'Take train SK44 from APR to CER. Sit in seat F23.');
    }
}
