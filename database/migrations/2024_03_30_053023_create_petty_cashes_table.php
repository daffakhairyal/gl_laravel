<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('petty_cash', function (Blueprint $table) {
            $table->id();
            $table->string('account');
            $table->string('detail');
            $table->string('noVoucher');
            $table->string('jenis');
            $table->date('tanggal'); // Mengubah menjadi tipe data tanggal
            $table->string('divisi');
            $table->string('karyawan');
            $table->string('deskripsi');
            $table->integer('debit'); // Mengubah menjadi tipe data integer
            $table->integer('credit'); // Mengubah menjadi tipe data integer
            $table->string('createdBy');
            $table->boolean('status'); // Mengubah menjadi tipe data boolean
            // Add more columns as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petty_cash');
    }
};
