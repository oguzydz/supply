<?php

namespace App\Models;

use App\Models\SupplyRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function manufacturers()
    {
        return $this->belongsToMany(Role::class, 'request_manufacturers');
    }


    public function requests()
    {
        return $this->hasMany(SupplyRequest::class, 'id');
    }

}
