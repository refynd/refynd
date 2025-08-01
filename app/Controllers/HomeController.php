<?php

namespace App\Controllers;

use Refynd\Http\Request;
use Refynd\Http\Response;
use Refynd\Validation\Validator;

class HomeController
{
    public function index(Request $request): Response
    {
        return view('home', [
            'title' => 'Welcome to Refynd',
            'message' => 'Your application is ready to forge something extraordinary!'
        ]);
    }
    
    public function about(Request $request): Response
    {
        return view('about', [
            'title' => 'About Refynd',
            'version' => '1.0.0'
        ]);
    }
    
    public function contact(Request $request): Response
    {
        return view('contact', [
            'title' => 'Contact Us'
        ]);
    }
    
    public function submitContact(Request $request): Response
    {
        $validator = new Validator($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Here you would typically save to database or send email
        // For demo purposes, we'll just return success
        
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! We\'ll get back to you soon.'
        ]);
    }
    
    public function notFound(Request $request): Response
    {
        return view('errors.404', [
            'title' => 'Page Not Found'
        ])->setStatusCode(404);
    }
}
