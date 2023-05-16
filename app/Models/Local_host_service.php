<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local_host_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'available',
        'service_name',
        'user_id',
        'food_item',
        'food_picture',
        'place_id',
        'feature',
        'room_price',
        'room_picture',
        'rating',
        'hotel_price',
        'food_price',
        'total_price'
        
    ];

    public function users()
    {

        return $this->belongsTo(User::class);

    }
    public function place()
    {

        return $this->belongsTo(Place::class);

    }


}
