<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'profession_id', 'company_id', 'comment'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['password'];

    public function profession() {
        return $this->belongsTo(Profession::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function userHistories() {
        return $this->hasMany(UserHistory::class);
    }
}
