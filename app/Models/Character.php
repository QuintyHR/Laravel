<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $creator
 * @property string $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $image
 * @property int $user_id
 * @property int $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUserId($value)
 */
class Character extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "image", "user_id", "tag", "created_at", "updated_at"];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
