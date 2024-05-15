<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\CelebrantMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAdminCelebrantNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday reminder emails to admin for the upcoming week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->addWeek();
        $endOfWeek = Carbon::now()->endOfWeek()->addWeek();
    
        $users = User::whereMonth('date_of_birth', '=', $startOfWeek->month)
                     ->whereDay('date_of_birth', '>=', $startOfWeek->day)
                     ->whereMonth('date_of_birth', '=', $endOfWeek->month)
                     ->whereDay('date_of_birth', '<=', $endOfWeek->day)
                     ->get();
    
        if($users->isNotEmpty()) {

            $adminEmail = 'adelekeyahaya05@gmail.com'; 
            // $adminEmail = 'administrator@p48inv.com'; 

            Mail::to($adminEmail)->send(new CelebrantMail($users));

            $this->info('Birthday reminder email sent to admin.');

        }

        $this->info(print_r($users->toArray(), true));
    }
    
}
