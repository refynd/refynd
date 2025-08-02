<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Refynd\Validation\Validator;

class HomeController
{
    public function index(Request $request): Response
    {
        return response(view('home', [
            'title' => 'Welcome to Refynd',
            'message' => 'Your application is ready to forge something extraordinary!'
        ]));
    }
    
    public function about(Request $request): Response
    {
        return response(view('about', [
            'title' => 'About Refynd',
            'version' => '2.0.0'
        ]));
    }
    
    public function contact(Request $request): Response
    {
        return response(view('contact', [
            'title' => 'Contact Us'
        ]));
    }
    
    public function submitContact(Request $request): Response
    {
        $validator = new Validator($request->request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);
        
        if ($validator->fails()) {
            return new JsonResponse([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Here you would typically save to database or send email
        // For demo purposes, we'll just return success
        
        return new JsonResponse([
            'success' => true,
            'message' => 'Thank you for your message! We\'ll get back to you soon.'
        ]);
    }
    
    public function notFound(Request $request): Response
    {
        return response(view('errors.404', [
            'title' => 'Page Not Found'
        ]), 404);
    }
}
