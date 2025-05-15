<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Factories\Admin\PerfumeFactory;


class Perfume extends Model
{
    use HasFactory;
    // protected static function newFactory()
    //     {
    //         return PerfumeFactory::new();
    //     }


    protected $fillable=['name','description','gender','size','company_factor_id','price','picture'];
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function companyFactor() {
        return $this->belongsTo(Company::class);

        
    }
}
