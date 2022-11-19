<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile_users';
    protected $fillable = [
    'bio',
    'address',
    'gender',
    'user_id',
   ];

    /*
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



