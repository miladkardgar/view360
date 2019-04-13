<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesAtributiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('files_atributies', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->integer('data_id');
//            $table->integer('file_id');
//            $table->string('type');
//            $table->string('status')->default("active");
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('files_atributies');
    }
}
