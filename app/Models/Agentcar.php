<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentcar extends Model
{
    use HasFactory;

    
    protected $table = "agent_cars";

    protected $fillable = ['id_agent','id_package','active'];
}
