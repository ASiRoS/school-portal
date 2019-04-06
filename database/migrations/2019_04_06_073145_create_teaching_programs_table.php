<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_programms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('class_grade', range(1, 11));
            $table->unsignedBigInteger('subject_id');
            $table->text('program');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teaching_programs', function(Blueprint $table) {
            $table->dropForeign('teaching_programs_subject_id_foreign');
        });

        Schema::dropIfExists('teaching_programs');
    }
}
