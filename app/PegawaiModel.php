<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model {
    protected $table = 'pegawai';
    protected $primarykey = 'nip';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'nip',
        'nm_pegawai',
        'jenis_kelamin',
        'agama',
        'tempat_lahir',
        'tgl_lahir',
        'dept',
        'jabatan'
    ];
}
