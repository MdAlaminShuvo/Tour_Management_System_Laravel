<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id',
        'user_id',
        'local_guide_service_id',
        'local_host_service_id',
        'rating',
        'comment',
        'date',

    ];

    public function local_guide_service()
    {

        return $this->belongsTo(Local_guide_service::class);

    }
    public function local_host_service()
    {

        return $this->belongsTo(Local_host_service::class);
        
        
    }
    public function order()
    {

        return $this->belongsTo(Order::class);
        
        
    }

}
