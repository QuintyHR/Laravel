<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser query()
 * @mixin \Eloquent
 */
class CharacterUser extends Model
{
    use HasFactory;

    protected $table = "character_user";

    protected $fillable = ["user_id", "character_id", "created_at", "updated_at"];
}
