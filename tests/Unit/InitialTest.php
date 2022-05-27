<?php

namespace Autotext\OpenAI\Test\Unit;

use Autotext\OpenAI\OpenAI;
use GuzzleHttp\Exception\GuzzleException;
use Orchestra\Testbench\TestCase;

class InitialTest extends TestCase
{
    public function test_instance_of_open_ai()
    {
        $this->assertInstanceOf(OpenAI::class, $this->init());
    }

    public function test_get_base_url()
    {
        $this->assertEquals(
            'https://api.openai.com/v1/',
            $this->init()->getBaseUrl()
        );
    }

    /**
     * @return OpenAI
     */
    private function init(): OpenAI
    {
        return new OpenAI();
    }

    /**
     * @throws GuzzleException
     */
    public function test_get_engine()
    {
        $this->assertEquals(200, $this->init()->getEngines()->getStatusCode());
    }
}