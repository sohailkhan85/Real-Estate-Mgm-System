<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllRequest extends Model
{
    use HasFactory;

    protected $table= "requests";
    protected $primaryKey="id";

    protected $fillable = [
        'prop_id',
        'user_id',
        'agent_name',
        'name',
        'email',
        'phone',
    ];
}
