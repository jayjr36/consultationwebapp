<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function schedules()
{
    return $this->hasMany(Schedule::class);
}

public function appointments()
{
    return $this->hasMany(Appointment::class);
}

public function messages()
{
    return $this->hasMany(Message::class, 'receiver_id');
}
}
