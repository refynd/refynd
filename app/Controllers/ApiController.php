<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\User;

class ApiController
{
    public function status(Request $request): Response
    {
        return new JsonResponse([
            'status' => 'ok',
            'message' => 'API is running',
            'version' => '2.0.0',
            'timestamp' => date('c')
        ]);
    }

    public function users(Request $request): Response
    {
        // Sample users data - in a real app, this would come from database
        $users = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com']
        ];

        return new JsonResponse([
            'data' => $users,
            'count' => count($users)
        ]);
    }

    public function createUser(Request $request): Response
    {
        $data = $request->request->all();
        
        // Basic validation
        if (empty($data['name']) || empty($data['email'])) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Name and email are required'
            ], 400);
        }

        // In a real application, you would save to database
        // For demo purposes, we'll just return the created user
        $user = [
            'id' => rand(1000, 9999),
            'name' => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'created_at' => date('c')
        ];

        return new JsonResponse([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
