<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentflight extends Model
{
    use HasFactory;

    protected $table = "agent_flight";

    protected $fillable = ['id_agent','id_package','active'];
}
