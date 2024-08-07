<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bet',
        'user_id',
        'available_balance',
        'new_balance',
        'net_winnings'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
