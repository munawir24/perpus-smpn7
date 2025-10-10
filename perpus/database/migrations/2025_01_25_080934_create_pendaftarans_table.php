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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('pendaftarans')->onDelete('cascade');
            $table->string('nama');
            $table->string('no_passport');
            $table->date('tgl_passport');
            $table->string('tempat_passport');
            $table->year('masa_passport');
            $table->year('expired_passport');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('city');
            $table->string('no_hp');
            $table->string('pekerjaan');
            $table->string('jenis_mahrom');
            $table->string('nama_mahrom');
            $table->string('jenis_kamar');
            $table->date('tgl_berangkat');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};