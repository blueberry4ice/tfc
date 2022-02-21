<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentattraction extends Model
{
    use HasFactory;

    protected $table = "agent_attractions";

    protected $fillable = ['id_agent','id_package','active'];
}
