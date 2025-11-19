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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();

            $table->string('judul');                 // Judul publikasi
            $table->text('deskripsi')->nullable(); // Deskripsi
            $table->string('tipe_file');                  // file / link
            $table->string('file_path')->nullable(); // Path file (jika file)
            $table->string('url')->nullable();       // Link (jika link)

            $table->unsignedBigInteger('uploaded_by')->nullable(); // ID admin
            $table->timestamps();

            // Relasi ke tabel admins
            $table->foreign('uploaded_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
