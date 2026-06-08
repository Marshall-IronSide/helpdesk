<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'email',
        'user_id',
    ];

    // Relation : un ticket appartient à un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
