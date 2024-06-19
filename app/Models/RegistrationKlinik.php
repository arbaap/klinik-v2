<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationKlinik extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'doctor_id', 'keluhan', 'resep', 'status', 'created_at', 'updated_at'
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACCEPTED = 'diterima';
    public const STATUS_COMPLETED = 'selesai';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
