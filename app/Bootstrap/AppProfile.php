<?php

namespace App\Bootstrap;

use Refynd\Config\AppProfile as BaseAppProfile;

class AppProfile extends BaseAppProfile
{
    public function __construct()
    {
        // Determine the base path (assuming this is in app/Bootstrap/)
        $basePath = dirname(dirname(__DIR__));
        
        // Load environment and initialize parent
        parent::__construct($basePath);
        
        // Set application-specific configurations
        $this->configureApplication();
    }
    
    protected function configureApplication(): void
    {
        // App configuration
        $this->set('app.name', env('APP_NAME', 'Refynd Application'));
        $this->set('app.env', env('APP_ENV', 'production'));
        $this->set('app.debug', env('APP_DEBUG', false));
        $this->set('app.url', env('APP_URL', 'http://localhost'));
        $this->set('app.timezone', env('APP_TIMEZONE', 'UTC'));
        
        // Database configuration
        $this->set('database.default', env('DB_CONNECTION', 'mysql'));
        $this->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'refynd'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ]);
        
        // Cache configuration
        $this->set('cache.default', env('CACHE_DRIVER', 'file'));
        $this->set('cache.stores.file', [
            'driver' => 'file',
            'path' => $this->storagePath('cache'),
        ]);
        $this->set('cache.stores.redis', [
            'driver' => 'redis',
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ]);
        
        // View configuration
        $this->set('view.paths', [
            $this->path('resources/views'),
        ]);
        $this->set('view.compiled', $this->storagePath('cache/views'));
    }
    
    public function registerRoutes(): void
    {
        $routesFile = $this->path('routes/web.php');
        if (file_exists($routesFile)) {
            require_once $routesFile;
        }
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? $default;
        
        if ($value === null) {
            return $default;
        }
        
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }
        
        return $value;
    }
}
