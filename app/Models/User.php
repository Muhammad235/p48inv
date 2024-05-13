<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'username',
        'password',
        'image',
        'date_of_birth',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'id' ,'referring_user_id');
    }

    public function bank(): HasOne
    {
        return $this->hasOne(BankDetail::class);

    }


    public function scopeUserCelebratingBirthdayThisWeek($query)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        return $query->whereMonth('date_of_birth', '=', $startOfWeek->month)
                     ->whereDay('date_of_birth', '>=', $startOfWeek->day)
                     ->whereMonth('date_of_birth', '=', $endOfWeek->month)
                     ->whereDay('date_of_birth', '<=', $endOfWeek->day)
                     ->get();
    }
    

}
