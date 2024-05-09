<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function sender()
{
    return $this->belongsTo(Patient::class, 'sender_id');
}

public function receiver()
{
    return $this->belongsTo(Doctor::class, 'receiver_id');
}
}
