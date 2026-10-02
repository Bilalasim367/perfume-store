<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactFormReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Mail::to('info@rawanaha.com')->send(new ContactFormReceived($data));

        return back()->with('success', 'Thank you for your message! We will get back to you within 24 hours.');
    }
}
