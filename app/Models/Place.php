<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places';
    protected $fillable = [
        'name',
        'address',
        'lat',
        'lng',
        'active',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
