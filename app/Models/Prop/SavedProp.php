<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedProp extends Model
{
    use HasFactory;

    protected $table = "saved_props";
    protected $primaryKey = "id";

    protected $fillable = [
        'prop_id',
        'user_id',
        'title',
        'image',
        'price',
        'location',
    ];
}
