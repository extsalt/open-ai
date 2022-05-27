<?php

namespace Extsalt\OpenAI\Test\Unit;

use Extsalt\OpenAI\OpenAI;
use Orchestra\Testbench\TestCase;

class InitialTest extends TestCase
{
    public function test_instance_of_open_ai()
    {
       $instance = new OpenAI();

       $this->assertInstanceOf(OpenAI::class, $instance);
    }
}