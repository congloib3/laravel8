<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test()
    {
        $startTime = microtime(true);

        for ($i = 0; $i < 20; $i++) {
            $testMail = new TestMail();
            $sendEmailJob = new SendEmail('mails.test');
            dispatch($sendEmailJob);
        }

        $endTime = microtime(true);
        $timeExecute = $endTime - $startTime;

        return "Done. Time execute: $timeExecute";
    }
}
