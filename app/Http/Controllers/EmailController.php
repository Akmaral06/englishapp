<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('email.form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver' => 'required|string|max:100',
            'address'  => 'required|email',
        ]);

        $demo = (object)[
            'receiver' => $request->receiver,
        ];

        Mail::to($request->address)->send(new DemoEmail($demo));

        return redirect()->back()->with('success', 'Email sent successfully to ' . $request->address . '!');
    }
}
