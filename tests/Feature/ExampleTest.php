<?php
namespace Tests\Feature;

use App\Parser\Engine;
use Tests\TestCase;

class ExampleTest extends TestCase{

    /** @test */
    public function firstTest() : void {
        $engine = new Engine();
        $engine->parse('SELECT $:param1 from $that;', ['param 1', 'param 2', 'param 3...']);

        $this->assertTrue(true,'Noice!');
    }
}
