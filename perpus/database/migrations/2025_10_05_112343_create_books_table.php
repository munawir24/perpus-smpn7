<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid()->default(value: DB::raw('(UUID())'))->index();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit')->nullable();
            $table->string('kota_terbit')->nullable();
            $table->string('isbn');
            $table->string('cover');
            $table->integer('jumlah_halaman');
            $table->string('lampiran')->nullable();
            $table->text('link')->nullable();
            $table->bigInteger('jumlah_view');
            $table->boolean('is_popular')->nullable();
            $table->boolean('is_publish')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
