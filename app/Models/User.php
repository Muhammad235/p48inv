<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    // public function getDateOfBirthAttribute($value)
    // {
    //     return date_format($value,'d-m-y') ?: ''; 
    // }

    // protected function DateOfBirth(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => date_format($value,'d-m-y'),
    //     );
    // }

}
