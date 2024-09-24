<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Jobs\TestJob;
use DateTime;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail-command {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id');

        $user = User::find($userId);

        if($user) 
        {
            $this->line("Hello, $user->name");

            Mail::send("mail.mail", ["name" => $user->name],
                        function($message) use($user) {
                            $message
                                ->to($user->email)
                                ->subject("Hello test")
                                ->from("top@academy.ru");
                        });
            $this->line("Letter sent!");
        }
        else
        {
            $this->line("No user found");
        }

        TestJob::dispatch((new DateTime)->format('c'), $user);
    }
}
