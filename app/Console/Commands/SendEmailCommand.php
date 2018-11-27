<?php

namespace App\Console\Commands;

use App\Mail\SendEmailMailable;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wasel-sendEmail:verify{user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Email to authorized email.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user_id = $this->argument('user');
        $users = User::find($user_id);
        $bar = $this->output->createProgressBar(1);
        $email = $users->email;

        try {
            Mail::to($email)->send(new SendEmailMailable());
            $bar->advance();
            Log::info('otp fetched successfully.'.$email);
            //$bar->advance();
        } catch (Exception $e) {
            $this->error('Something went wrong!'.$e->getMessage());
        }
        $message = '--Sending Email through SMTP Command--';
        Log::info($message);
        $bar->finish();
        $this->info('Done!');
        //return $this->release(10);
    }
}
