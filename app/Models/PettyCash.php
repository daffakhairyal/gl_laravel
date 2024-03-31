<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCash extends Model
{
    use HasFactory;

    protected $table = 'petty_cashes'; // Sesuaikan dengan nama tabel di database
    protected $fillable = [
        'account',
        'detail',
        'noVoucher',
        'jenis',
        'tanggal',
        'divisi',
        'karyawan',
        'deskripsi',
        'debit',
        'credit',
        'createdBy',
        'status'
    ];

    // Aturan validasi untuk model PettyCash
    public static $rules = [
        'status' => 'required|boolean' // Memastikan status adalah boolean (0 atau 1)
    ];
}
