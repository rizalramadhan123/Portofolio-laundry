<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadetergen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function datapelanggan(){
        return $this->hasMany(datapelanggan::class);
    }
}
