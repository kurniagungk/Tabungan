<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';

    protected $fillable = [
        'id',
        'nis',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'asrama',
        'jenis_kelamin',
        'wali',
        'foto',
        'telepon',
        'status',
        'sekolah_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'password',
        'card',
        'saldo'
    ];


    protected $keyType = 'string';

    public function asrama()
    {
        return $this->hasOne('App\asrama', 'id', 'asrama_id');
    }
    public function provinsi()
    {
        return $this->hasOne('App\wilayah', 'kode', 'provinsi_id');
    }
    public function kabupaten()
    {
        return $this->hasOne('App\wilayah', 'kode', 'kabupaten_id');
    }
    public function kecamatan()
    {
        return $this->hasOne('App\wilayah', 'kode', 'kecamatan_id');
    }
    public function desa()
    {
        return $this->hasOne('App\wilayah', 'kode', 'desa_id');
    }
}
