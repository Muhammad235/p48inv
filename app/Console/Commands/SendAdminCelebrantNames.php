<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAdminCelebrantNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:birthday-emails';

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
            // $userDetails = $users->map(function ($user) {
            //     return "<li>{$user->name} ({$user->email}) - " . date('jS F', strtotime($user->date_of_birth)) . "</li>";
            // })->implode('');
            

            // $subject = config('app.name') . ' Birthday Celebrants';

            // $adminEmail = 'adelekeyahaya05@gmail.com'; 

            // Mail::raw("Hello admin,<br><br>Here are the list of users celebrating birthdays this week:<br><ul>{$userDetails}</ul>", function ($message) use ($adminEmail, $subject) {
            //     $message->to($adminEmail)->subject($subject);
            // });
        }

    
        // $this->info('Birthday reminder email sent to admin.');

        $this->info(print_r($users->toArray(), true));
    }
    
}
