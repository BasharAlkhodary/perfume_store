<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Glass extends Model
{
    use HasFactory;
    protected $fillable=['name','picture','size','color'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
