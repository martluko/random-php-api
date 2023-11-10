<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = ['comment', 'date_time', 'user_id', 'professional_id', 'payment_id'];
    protected $dates = ['deleted_at', 'created_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function professional() {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }
}
