<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table="mobil";
    protected $primaryKey='id';

    protected $fillable = [
        'plat_mobil', 'merk', 'foto', 'keterangan'
    ];
}
