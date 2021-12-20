<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = 'pembelajaran';
    protected $fillable = [
        'kelas_id',
        'mapel_id',
        'guru_id',
        'status'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function k13_rencana_nilai_pengetahuan()
    {
        return $this->hasMany('App\K13RencanaNilaiPengetahuan');
    }

    public function k13_rencana_nilai_keterampilan()
    {
        return $this->hasMany('App\K13RencanaNilaiKeterampilan');
    }

    public function k13_rencana_nilai_spiritual()
    {
        return $this->hasMany('App\K13RencanaNilaiSpiritual');
    }

    public function k13_rencana_nilai_sosial()
    {
        return $this->hasMany('App\K13RencanaNilaiSosial');
    }

    public function k13_rencana_bobot_penilaian()
    {
        return $this->hasOne('App\K13RencanaBobotPenilaian');
    }

    public function k13_nilai_pts_pas()
    {
        return $this->hasMany('App\K13NilaiPtsPas');
    }

    public function k13_nilai_akhir_raport()
    {
        return $this->hasMany('App\K13NilaiAkhirRaport');
    }

    public function k13_deskripsi_nilai_siswa()
    {
        return $this->hasMany('App\K13DeskripsiNilaiSiswa');
    }
}
