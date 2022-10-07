<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const PAYMENT_STATUS_OK = 'OK';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function senderAccount()
    {
        return $this->belongsTo(User::class, 'sender_account_id');
    }

    public function recipientAccount()
    {
        return $this->belongsTo(User::class, 'recipient_account_id');
    }
}
