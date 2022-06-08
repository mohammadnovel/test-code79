<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    public function point()
    {
        return $this->hasMany('App\Models\Point');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
