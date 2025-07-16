<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller; 

class ContactController extends Controller
{
    /**
     * Menampilkan halaman utama (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customers/contact'); // Mengembalikan tampilan home.blade.php
    }
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'body' => $validated['message'],
        ];

        Mail::send('mail.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('habilmushani0102@gmail.com')
                ->subject($data['subject'])
                ->replyTo($data['email'], $data['name']);
        });

        return back()->with('success', 'Your message has been sent!');
    }
}
