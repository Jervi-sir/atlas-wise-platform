<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Event;
use App\Models\Group;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\Reunion;
use App\Models\Annoncement;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /*----------- Role  -----------------------*/
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /*----------- Skill  -----------------------*/
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_users');
    }

    /*----------- Profile  -----------------------*/
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /*----------- Group  -----------------------*/
    public function president_of()
    {
        return $this->hasOne(Group::class, 'president_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    /*----------- Reunion  -----------------------*/
    public function invited_to_reunion()
    {
        return $this->belongsToMany(Reunion::class, 'reunion_users');
    }

    public function make_reunion()
    {
        return $this->hasMany(Reunion::class, 'creator_id');
    }

    /*----------- Event  -----------------------*/
    public function invited_to_event()
    {
        return $this->belongsToMany(Event::class, 'event_users');
    }

    public function make_event()
    {
        return $this->hasMany(Event::class, 'creator_id');
    }

    



}






/*
    public function annoncements()
    {
        return $this->belongsToMany(Annoncement::class, 'annoncement_users');
    }

    public function annonce()
    {
        return $this->hasMany(Annoncement::class, 'creator_id');
    }
*/

/*    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_role_user', 'user_id', 'group_id', 'role_gorup_id');
    }

*/