<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        if($request->method() == 'POST') {
            $body = "<p><b>Name:</b>{$request->input('name')}</p>";
            $body .= "<p><b>E-mail:</b>{$request->input('email')}</p>";
            $body .= "<p><b>Message:</b><br>" . nl2br($request->input('text')) . "</p>";

            Mail::to('web-dev@annazubenko.ru')->send(new TestMail($body));
            $request->session()->flash('success', 'Message - OK');

            return redirect('/send');
        }

        $title = 'Send mail';
        return view('send', compact('title'));
    }
}
