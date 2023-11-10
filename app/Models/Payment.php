<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['comment', 'stripe_payment_id'];
    protected $dates = ['deleted_at'];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
