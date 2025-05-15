<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=['name','email','phone','address'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function orders() {
        return $this->hasMany(Order::class);
    }   
}
