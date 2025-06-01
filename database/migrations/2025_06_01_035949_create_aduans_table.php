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
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('nama_pelapor');
            $table->string('alamat_pelapor');
            $table->string('pernyataan_pelapor');
            $table->string('email_pelapor');
            $table->string('phone_pelapor');
            $table->enum('hubungi', ['Telepon', 'Email', 'Pesan']);
            $table->string('nama_korban')->nullable();
            $table->enum('jenis_kelamin_korban', ['Laki-laki', 'Perempuan']);
            $table->string('alamat_korban')->nullable();
            $table->string('phone_korban')->nullable();
            $table->enum('status_korban', ['Pimpinan','Dosen','Tenaga Pendidik','Satpam', 'OB','Mahasiswa']);
            $table->string('nama_terlapor')->nullable(); 
            $table->enum('jenis_kelamin_terlapor', ['Laki-laki', 'Perempuan']);
            $table->string('alamat_terlapor')->nullable();
            $table->string('phone_terlapor')->nullable();
            $table->enum('status_terlapor', ['Pimpinan','Dosen','Tenaga Pendidik','Satpam', 'OB','Mahasiswa']);
            $table->text('karakteristik_terlapor');
            $table->enum('terlapor',['Iya', 'Tidak']);
            $table->text('warning_detail')->nullable();
            $table->string('tanggal_peristiwa');
            $table->enum('category',['Fisik', 'Verbal', 'Seksual', 'Psikologis']);
            $table->text('chronology');
            $table->string('bukti_pelaporan');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduans');
    }
};
