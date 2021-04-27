<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->time('started_at')->nullable();
            $table->time('ended_at')->nullable();
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->text('points')->nullable();
            $table->text('instructor_report')->nullable();
            $table->text('instructor_note')->nullable();
            $table->text('task')->nullable();

            $table->foreignId('batch_id')->nullable()->references('id')->on('batches')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('instructor_id')->nullable()->references('id')->on('instructors')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('reports');
    }
}
