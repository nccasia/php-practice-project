<?php

namespace Tests\Feature;

use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    public function testSendMail()
    {
        $mailUser = 'kensu8434@gmail.com';
        Mail::fake();
        Mail::to('kensu8434@gmail.com')->send(new SendEmail(['content' => 'Hello World!']));
        Mail::assertSent(SendEmail::class);
    }
}
