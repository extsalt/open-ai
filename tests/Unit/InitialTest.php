<?php

namespace Autotext\OpenAI\Test\Unit;

use Autotext\OpenAI\OpenAI;
use Orchestra\Testbench\TestCase;

class InitialTest extends TestCase
{
    public function test_instance_of_open_ai()
    {
       $instance = new OpenAI();

       $this->assertInstanceOf(OpenAI::class, $instance);
    }
}