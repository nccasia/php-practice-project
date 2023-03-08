<?php

use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Testing\Fakes\QueueFake;
use Tests\TestCase;

class QueueJobTest extends TestCase
{
    public function testQueue_job()
    {
        Queue::fake([
            SendEmailJob::class
        ]);

        Queue::push(new SendEmailJob());
        Queue::assertPushed(SendEmailJob::class);
    }
}
