<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function perfumes() {
        return $this->hasMany(Perfume::class);
    }
}