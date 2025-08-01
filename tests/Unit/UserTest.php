<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user_can_be_created(): void
    {
        $user = new User([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);
        
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
    }
    
    public function test_user_display_name(): void
    {
        $user = new User(['name' => 'Jane Doe', 'email' => 'jane@example.com']);
        $this->assertEquals('Jane Doe', $user->display_name);
        
        $userWithoutName = new User(['email' => 'no-name@example.com']);
        $this->assertEquals('no-name@example.com', $userWithoutName->display_name);
    }
    
    public function test_user_verification_status(): void
    {
        $user = new User();
        $this->assertFalse($user->isVerified());
        
        $user->email_verified_at = now();
        $this->assertTrue($user->isVerified());
    }
}
