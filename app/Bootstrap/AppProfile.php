<?php

namespace App\Bootstrap;

use Refynd\Config\AppProfile as BaseAppProfile;

class AppProfile extends BaseAppProfile
{
    public function __construct()
    {
        // Load environment variables
        $this->loadEnvironment();
        
        // Set application configurations
        $this->setConfigurations([
            'app' => [
                'name' => env('APP_NAME', 'Refynd Application'),
                'env' => env('APP_ENV', 'production'),
                'debug' => env('APP_DEBUG', false),
                'url' => env('APP_URL', 'http://localhost'),
                'timezone' => env('APP_TIMEZONE', 'UTC'),
            ],
            
            'database' => [
                'default' => env('DB_CONNECTION', 'mysql'),
                'connections' => [
                    'mysql' => [
                        'driver' => 'mysql',
                        'host' => env('DB_HOST', '127.0.0.1'),
                        'port' => env('DB_PORT', '3306'),
                        'database' => env('DB_DATABASE', 'refynd'),
                        'username' => env('DB_USERNAME', 'root'),
                        'password' => env('DB_PASSWORD', ''),
                        'charset' => 'utf8mb4',
                        'collation' => 'utf8mb4_unicode_ci',
                    ],
                ],
            ],
            
            'cache' => [
                'default' => env('CACHE_DRIVER', 'file'),
                'stores' => [
                    'file' => [
                        'driver' => 'file',
                        'path' => __DIR__ . '/../../storage/cache',
                    ],
                    'redis' => [
                        'driver' => 'redis',
                        'host' => env('REDIS_HOST', '127.0.0.1'),
                        'password' => env('REDIS_PASSWORD', null),
                        'port' => env('REDIS_PORT', 6379),
                        'database' => env('REDIS_DB', 0),
                    ],
                ],
            ],
            
            'view' => [
                'paths' => [
                    __DIR__ . '/../../resources/views',
                ],
                'compiled' => __DIR__ . '/../../storage/cache/views',
            ],
        ]);
        
        // Register routes
        $this->registerRoutes();
    }
    
    private function loadEnvironment(): void
    {
        $envFile = __DIR__ . '/../../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                
                [$name, $value] = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value, " \t\n\r\0\x0B\"'");
                
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
    
    private function registerRoutes(): void
    {
        require_once __DIR__ . '/../../routes/web.php';
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
