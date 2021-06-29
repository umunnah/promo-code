<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseTestCase extends TestCase
{
    use refreshDatabase;

    protected $headers;
    /**
     * @var string
     */
    protected $baseUrl;

    protected function setUp(): void
    {
        parent::setUp();

    }


}
