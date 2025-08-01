<?php

namespace App\Controllers;

use Refynd\Http\Request;
use Refynd\Http\Response;
use Refynd\Cache\Cache;
use App\Models\User;

class ApiController
{
    public function status(Request $request): Response
    {
        return response()->json([
            'status' => 'ok',
            'timestamp' => time(),
            'version' => '1.0.0',
            'framework' => 'Refynd'
        ]);
    }
    
    public function users(Request $request): Response
    {
        // Example using cache
        $users = Cache::remember('api.users', 300, function() {
            // In a real app, this would fetch from database
            return [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ];
        });
        
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }
    
    public function createUser(Request $request): Response
    {
        $validator = new \Refynd\Validation\Validator($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Example user creation (would typically use database)
        $user = [
            'id' => rand(1000, 9999),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Clear users cache
        Cache::forget('api.users');
        
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
