<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1) Validate only the fields you actually submit
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email'],
            'phone'   => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // 2) Choose a clear recipient (set MAIL_TO_ADDRESS in .env)
        $to = env('MAIL_TO_ADDRESS', config('mail.from.address'));

        // 3) Send a simple text email
        $subject = 'New Contact Form - ' . config('app.name');

        Mail::raw(
            "Name: {$data['name']}\n" .
                "Email: {$data['email']}\n" .
                "Phone: " . ($data['phone'] ?: '-') . "\n\n" .
                "Message:\n{$data['message']}",
            function ($m) use ($to, $subject, $data) {
                $m->to($to)
                    ->replyTo($data['email'], $data['name'])
                    ->subject($subject);
            }
        );

        return back()->with('ok', 'Thanks! We received your message.');
    }
}
