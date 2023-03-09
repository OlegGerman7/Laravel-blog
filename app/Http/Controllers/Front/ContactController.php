<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{
    public function show(Request $request){
        if($request->method() == 'POST') {
            $body = "<p><b>Subject:</b>" . $request->input('subject') . "</p>";
            $body .= "<p><b>Message:</b><br>" . nl2br($request->input('message')) . "</p>";
            Mail::to('oleg.german@gmail.com')->send(new ContactMail($body, $request->file('file')));
            $request->session()->flash('success', 'Message sent');
            return redirect()->route('show.form');
        } else {
            return view('front.contact');
        }
    }
}
