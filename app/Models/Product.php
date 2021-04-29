<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = ['art', 'name', 'status', 'data'];
    protected $casts = [
        'data' => 'array'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 'unavailable');
    }

    public static function routeNotificationFor(){
        return config('mail.mail_to');
    }
}
