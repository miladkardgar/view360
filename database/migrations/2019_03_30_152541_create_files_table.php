<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('data_id')->default(0);
            $table->string('fileStatus')->nullable();
            $table->string('area')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('parking')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();

            $table->integer('city_id')->default(0);
            $table->integer('region_id')->default(0);
            $table->string('usages')->nullable();
            $table->integer('arena')->nullable();
            $table->integer('building')->nullable();

            $table->string('price')->nullable();
            $table->string('areaPrice')->nullable();
            $table->string('direction')->nullable();
            $table->string('ownership_document_status')->nullable();

            $table->integer('floor')->nullable();
            $table->integer('unit')->nullable();
            $table->integer('countFloor')->nullable();

            $table->string('mortgage')->nullable();
            $table->string('rent')->nullable();

            $table->integer('buildingYear')->nullable();
            $table->longText('description')->nullable();

            $table->string("oldArea")->nullable();
            $table->string("yearMortgage")->nullable();
            $table->string("dayMortgage")->nullable();
            $table->string("floorType")->nullable();
            $table->string("commercialType")->nullable();

            $table->string("ownerName")->nullable();
            $table->string("ownerPhone")->nullable();
            $table->string("address")->nullable();

            $table->integer('user_id')->default(0);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('files');
    }
}
