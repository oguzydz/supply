<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condition;
use App\Models\Manufacturer;
use App\Models\Brand;
class SupplyRequest extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'brand_id',
        'brand',
        'model',
        'part_no',
        'part_desc',
        'qty',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'requests_conditions', 'request_id', 'condition_id');
    }

    // public function brand()
    // {
    //     return $this->belongsToMany(Brand::class, 'brands', 'id', 'brand_id');

    // }

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class, 'requests_manufacturers', 'request_id', 'manufacturer_id');
    }
}
