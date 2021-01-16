<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_mhs', function (Blueprint $table) {
            $table->id();
            $table->string('file_upload');
            $table->foreignId('user_id')->nullable();
            $table->enum('tindakan', ['disetujui', 'tidak'])->nullable();
            $table->string('surat_disetujui')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_mhs');
    }
}
