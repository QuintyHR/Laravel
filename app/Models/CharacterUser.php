<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterUser extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "character_id", "created_at", "updated_at"];
}
