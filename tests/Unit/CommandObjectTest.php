<?php

namespace Tests\Unit;

use App\Parser\Objects\CommandObject;
use Tests\TestCase;

class CommandObjectTest extends TestCase
{
    /**
     * @test
     * @dataProvider argumentArray
     */
    function testItChecksArgumentsAreClosed($item): void
    {
        $this->assertTrue($item->isClosed());
    }

    function argumentArray()
    {
        return [
            [new CommandObject(true)],
            [new CommandObject(true)],
            [new CommandObject(true)],
            [new CommandObject(true)],
            [new CommandObject(true)],
        ];
    }
}
