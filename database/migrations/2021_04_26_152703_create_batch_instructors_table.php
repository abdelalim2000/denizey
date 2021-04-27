<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_instructors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->nullable()->references('id')->on('instructors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('batch_id')->nullable()->references('id')->on('batches')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('batch_instructors');
    }
}
