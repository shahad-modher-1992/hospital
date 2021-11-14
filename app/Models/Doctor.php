<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;
use Laravel\Passport\HasApiTokens;

class Doctor extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['name', 'phone', 'specialty_id', 'room_no', 'image'];

    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
