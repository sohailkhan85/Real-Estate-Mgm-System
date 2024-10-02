<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Props extends Model
{
    use HasFactory;

    protected $table = "props";
    protected $PrimaryKey = "id";
    
    protected $fillable = [

        'title',
        'price',
        'beds',
        'baths',
        'sq_ft',
        'home_type',
        'year_built',
        'price_sqft',
        'more_info',
        'location',
        'agent_name',
        'type',
        'city',
       
    ];
}
