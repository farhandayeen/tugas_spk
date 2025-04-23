<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAlternatifsTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->constrained()->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->double('skor'); // nilai skor untuk kriteria (rentang 0 - 1)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_alternatifs');
    }
}
