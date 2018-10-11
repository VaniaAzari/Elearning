<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupKuisEssay extends Model
{
      protected $table ='group_kuis_essay';

    protected $fillable = [
        'name', 'kelas_id', 'matkul_id', 'angkatan_id'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function matkul()
    {
        return $this->belongsTo('App\Matakuliah','matkul_id');
    }

     public function angkatan()
    {
        return $this->belongsTo('App\Angkatan','angkatan_id');
    }
}
