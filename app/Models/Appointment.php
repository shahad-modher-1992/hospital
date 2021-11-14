<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasApiTokens , HasFactory;
    protected $fillable = ['name', 'phone', 'status', 'email', 'user_id', 'doctor_id', 'message', 'date'];
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
