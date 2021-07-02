<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

/*    public function role_groups()
    {
        return $this->belongsToMany(User::class, 'group_role_user', 'user_id', 'group_id', 'role_gorup_id');
    }
**/
    public function president()
    {
        return $this->belongsTo(User::class, 'president_id');
    }


}
