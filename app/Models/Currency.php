<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';
    protected $fillable = [
        'name',
        'code',
        'rate',
        'active',
        'min_user',
        'max_user',
        'max_driver',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
