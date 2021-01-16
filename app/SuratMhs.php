<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMhs extends Model
{
    protected $table = 'surat_mhs';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
