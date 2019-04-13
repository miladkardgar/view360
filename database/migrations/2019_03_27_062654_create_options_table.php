<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char("site_title")->nullable();
            $table->char("site_description")->nullable();
            $table->char("site_url")->nullable();
            $table->longText("site_about")->nullable();
            $table->char("site_email")->nullable();
            $table->char("site_email2")->nullable();
            $table->char("site_tel")->nullable();
            $table->char("site_tel2")->nullable();
            $table->char("site_mobile")->nullable();
            $table->char("site_mobile2")->nullable();
            $table->char("site_fax")->nullable();
            $table->char("site_fax2")->nullable();
            $table->char("site_address")->nullable();
            $table->char("site_address2")->nullable();

            $table->string("site_lan")->nullable();
            $table->string("site_lon")->nullable();
            $table->string("site_instagram")->nullable();
            $table->string("site_telegram")->nullable();
            $table->string("site_twitter")->nullable();
            $table->string("site_facebook")->nullable();

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
        Schema::dropIfExists('options');
    }
}
