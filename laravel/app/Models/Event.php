<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'event_date', 'is_outdoor', 'address', 'max_participants', 'image_path', 'user_id', 'approved'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'event_id', 'user_id');
    }
}
