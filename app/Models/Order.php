<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','amount','address','status','transaction_id','currency'];

    public function place()
    {

        return $this->belongsTo('App\Models\Place');

    }
    public function local_guide_service()
    {

        return $this->belongsTo('App\Models\Local_guide_service');

    }
    public function local_host_service()
    {

        return $this->belongsTo('App\Models\Local_host_service');

    }


}
