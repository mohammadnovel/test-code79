<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'account_id',
        'transaction_date',
        'description',
        'status',
        'amount'
    ];

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}
