<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Refynd\Bootstrap\Engine;
use App\Bootstrap\AppProfile;

abstract class TestCase extends BaseTestCase
{
    protected Engine $app;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->app = new Engine(new AppProfile());
    }
    
    protected function tearDown(): void
    {
        unset($this->app);
        parent::tearDown();
    }
}
