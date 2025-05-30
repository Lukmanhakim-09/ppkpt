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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('fullname');
            $table->string('address_reporter');
            $table->string('file_statement');
            $table->string('email_reporter');
            $table->string('phone_reporter');
            $table->enum('hubungi', ['Telepon', 'Email', 'Pesan']);
            $table->string('name_victim');
            $table->enum('gender_victim', ['Laki-laki', 'Perempuan']);
            $table->string('address_victim');
            $table->string('phone_victim');
            $table->enum('status_victim', ['Pimpinan','Dosen','Tenaga Pendidik','Satpam', 'OB','Mahasiswa']);
            $table->string('name_reported');
            $table->enum('gender_reported', ['Laki-laki', 'Perempuan']);
            $table->string('address_reported');
            $table->string('phone_reported');
            $table->enum('status_reported', ['Pimpinan','Dosen','Tenaga Pendidik','Satpam', 'OB','Mahasiswa']);
            $table->text('character');
            $table->enum('terlapor',['Iya', 'Tidak']);
            $table->text('warning');
            $table->string('tanggal');
            $table->enum('category',['Fisik', 'Verbal', 'Seksual', 'Psikologis']);
            $table->text('chronology');
            $table->string('file_proof');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
