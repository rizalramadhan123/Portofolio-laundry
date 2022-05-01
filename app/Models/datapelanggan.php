<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function detergen(){
        return $this->belongsTo(datadetergen::class,'id_detergen');
    }
    
}
