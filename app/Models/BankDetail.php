<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_name',
        'bank_name',  
        'address',  
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
