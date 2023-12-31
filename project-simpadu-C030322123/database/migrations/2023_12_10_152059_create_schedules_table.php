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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->dateTime('schedule_date');
            $table->string('schedule_type');
            $table->timestamps();
            $table->string('hari')->nullable();
            $table->string('jam_mulai')->nullable();
            $table->string('jam_selesai')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('kode_absensi')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->string('semester')->nullable();
            $table->string('created_by')->nullable();
            $table->string('update_by')->nullable();
            $table->string('delete_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
