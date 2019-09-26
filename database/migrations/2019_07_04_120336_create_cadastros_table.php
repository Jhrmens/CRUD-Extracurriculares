<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();            
            $table->unsignedBigInteger('cooperado_id');
            $table->unsignedBigInteger('extracurricular_id');
            $table->unsignedBigInteger('extracurricular_id2')->nullable();
            $table->unsignedBigInteger('extracurricular_id3')->nullable();
            $table->unsignedBigInteger('extracurricular_id4')->nullable();
            $table->unsignedBigInteger('extracurricular_id5')->nullable();
            $table->string('dependente');
            $table->string('serie');
            $table->enum('integral', ['0', '1'])->default('0');
            /*$table->foreign('cooperado_id')->references('id')->on('cooperados');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars');*/
        });

        Schema::table('cadastros', function($table) {
            $table->foreign('cooperado_id')->references('id')->on('cooperados');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars');
            $table->foreign('extracurricular_id2')->references('id')->on('extracurriculars');
            $table->foreign('extracurricular_id3')->references('id')->on('extracurriculars');
            $table->foreign('extracurricular_id4')->references('id')->on('extracurriculars');
            $table->foreign('extracurricular_id5')->references('id')->on('extracurriculars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastros');
    }
}
