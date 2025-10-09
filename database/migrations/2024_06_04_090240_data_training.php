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
        Schema::create('data_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ticket')->unique();
            $table->integer('penghasilan');
            $table->integer('pekerjaan');
            $table->integer('perkawinan');
            $table->integer('calon_penghuni');
            $table->integer('status_penempatan');
            $table->integer('status_kependudukan');
            $table->integer('status_kepemilikan_rumah');
            $table->integer('kelayakan')->default(0)->comment("0:tidak layak, 1: for layak");
            $table->integer('status')->default(0)->comment("0:for data training, 1: for data testing");
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_trainings');
    }
};
