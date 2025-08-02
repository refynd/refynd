<?php

namespace App\Models;

use Refynd\Database\Model;

class User extends Model
{
    protected string $table = 'users';
    
    protected array $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password'
    ];
    
    protected array $hidden = [
        'password',
        'remember_token'
    ];
    
    protected array $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];
    
    public static function findByEmail(string $email): ?self
    {
        return static::query()
            ->where('email', $email)
            ->first();
    }
    
    public function isVerified(): bool
    {
        return !is_null($this->getAttribute('email_verified_at'));
    }
    
    public function __get(string $key): mixed
    {
        // Handle display_name accessor
        if ($key === 'display_name') {
            return $this->getDisplayNameAttribute();
        }
        
        return parent::__get($key);
    }
    
    public function getDisplayNameAttribute(): string
    {
        $name = $this->getAttribute('name');
        $email = $this->getAttribute('email');
        return $name ?: $email ?: '';
    }
}
