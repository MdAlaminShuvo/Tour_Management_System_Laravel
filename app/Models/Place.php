<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'photo',
    ];

    public function local_guide_services()
    {
        return $this->hasMany(Local_guide::class);
    }

    public function local_host_services()
    {
        return $this->hasMany(Local_host::class);
        
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }





}
