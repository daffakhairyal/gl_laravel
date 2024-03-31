<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $fillable = ['name', 'account', 'induk', 'level', 'defSaldo', 'klasifikasi', 'type'];

    // Kolom-kolom lainnya dan definisi lainnya bisa ditambahkan di sini sesuai kebutuhan
}
