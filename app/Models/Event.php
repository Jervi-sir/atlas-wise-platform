<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    public function invited()
    {
        return $this->belongsToMany(User::class, 'event_users');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

}
