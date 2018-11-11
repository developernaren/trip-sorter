<?php
namespace Tests\App\Transportation;

use App\Transportation\Bus;
use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{

    public function testTravelStatementForBusIsReturnedCurrentlyWhenSeatIsNotAssigned()
    {
        $bus = new Bus('Dubai', 'Nepal');
        $this->assertSame($bus->getTravelStatement(), 'Take the bus from Dubai to Nepal. No seat assignment.');
    }

    public function testTravelStatementForBusIsReturnedCurrentlyWhenSeatIsAssigned()
    {
        $bus = new Bus('Dubai', 'Nepal', 'A11');
        $this->assertSame($bus->getTravelStatement(), 'Take the bus from Dubai to Nepal. Seat A11.');
    }


}
