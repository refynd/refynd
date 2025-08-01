<?php

namespace App\Models;

use Refynd\Database\Record;

class User extends Record
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
        return !is_null($this->email_verified_at);
    }
    
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: $this->email;
    }
}
