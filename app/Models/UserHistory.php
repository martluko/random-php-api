<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHistory extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'professional_id', 'booking_id', 'title', 'comment'];
    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function professional() {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
