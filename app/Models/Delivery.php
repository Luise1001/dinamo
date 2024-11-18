<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Place;
use App\Models\User;
use App\Models\Driver;
use App\Models\Currency;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $fillable = [
        'user_id',
        'driver_id',
        'currency_id',
        'amount',
        'address_id',
        'place_id',
        'status',
        'progress'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
