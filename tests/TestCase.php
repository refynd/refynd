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
        
        $profile = new AppProfile();
        $this->app = new Engine($profile);
        
        // Register routes after engine is initialized
        $profile->registerRoutes();
    }
    
    protected function tearDown(): void
    {
        unset($this->app);
        parent::tearDown();
    }
}
