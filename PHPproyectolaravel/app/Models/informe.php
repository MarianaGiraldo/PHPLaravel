<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informe extends Model
{
    use HasFactory;
    public function informeGastos(){
        return $this->hasMany(Gasto::class);
    }
}
