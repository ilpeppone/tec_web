<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'image_path', 'is_outdoor', 'event_date', 'max_participants', 'address', 'approved'
    ];

    protected $dates = ['event_date'];

    public function setEventDateAttribute($value)
    {
        $this->attributes['event_date'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }

    public function getEventDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'event_id', 'user_id');
    }
}
