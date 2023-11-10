<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $dates = ['deleted_at', 'created_at'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
