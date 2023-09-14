<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];  

    public function company(){
        return $this->belongsTo('\App\Models\Company', 'company_id', 'id');
    }

}
