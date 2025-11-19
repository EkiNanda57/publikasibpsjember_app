<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe_file',
        'file_path',
        'url',
        'uploaded_by',
    ];

    /**
     * Relasi ke user (admin yang upload)
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
