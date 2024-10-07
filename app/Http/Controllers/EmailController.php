<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $recipient = 'muhammadadhitya24@gmail.com';
        Mail::to($recipient)->send(new TestEmail());

        return 'Email telah dikirim!';
    }
}

