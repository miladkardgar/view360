<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('data', function (Blueprint $table) {
//            $table->bigIncrements('id')->autoIncrement();
//            $table->string('title');
//            $table->integer('parent')->default(0);
//            $table->integer('sort')->default(0);
//            $table->string('file')->nullable();
//            $table->string('status')->nullable();
//            $table->string('type')->nullable();
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
//        Schema::dropIfExists('data');
    }
}



//INSERT INTO `data` (`id`, `title`, `parent`, `sort`, `file`, `status`, `created_at`, `updated_at`, `type`)
//VALUES
//(1, 'زمین', 0, 1, 'land', '', NULL, NULL, 'fileType'),
//	(2, 'آپارتمان', 0, 2, 'apartment', '', NULL, NULL, 'fileType'),
//	(3, 'کلنگی', 0, 3, 'oldBuild', '', NULL, NULL, 'fileType'),
//	(4, 'مجتمع', 0, 4, 'integrated', '', NULL, NULL, 'fileType'),
//	(6, 'اطلاعات شهری و گردشگری', 0, 5, 'city', '', NULL, NULL, 'fileType'),
//	(7, 'غذاخوری', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(8, 'رستوران', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(9, 'هتل', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(10, 'مرکز توریستی', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(11, 'مرکز تجاری', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(12, 'مرکز خرید', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(13, 'سایر', 0, 0, NULL, '', NULL, NULL, 'cityType'),
//	(14, 'ویلا', 0, 6, 'vila', '', NULL, NULL, 'fileType'),
//	(15, 'فروش', 0, 1, NULL, '', NULL, NULL, 'transactionType'),
//	(16, 'مشارکت', 0, 2, NULL, '', NULL, NULL, 'transactionType'),
//	(17, 'فروش یا مشارکت', 0, 3, NULL, '', NULL, NULL, 'transactionType'),
//	(18, 'شش دانگ', 0, 1, NULL, '', NULL, NULL, 'ownerShipDocumentType'),
//	(19, 'مشاع', 0, 2, NULL, '', NULL, NULL, 'ownerShipDocumentType'),
//	(20, 'بنچاق', 0, 3, NULL, '', NULL, NULL, 'ownerShipDocumentType'),
//	(21, 'تجاری', 0, 1, NULL, '', NULL, NULL, 'usageType'),
//	(22, 'مسکونی', 0, 2, NULL, '', NULL, NULL, 'usageType'),
//	(23, 'تجاری و مسکونی', 0, 3, NULL, '', NULL, NULL, 'usageType'),
//	(24, 'جنگلی و جلگه ای', 0, 4, NULL, '', NULL, NULL, 'usageType'),
//	(25, 'ذخیره شهری', 0, 5, NULL, '', NULL, NULL, 'usageType'),
//	(26, 'فاقد کاربری', 0, 6, NULL, '', NULL, NULL, 'usageType'),
//	(27, 'فروش', 0, 1, NULL, '', NULL, NULL, 'transactionTypeVila'),
//	(28, 'اجاره سالیانه', 0, 2, NULL, '', NULL, NULL, 'transactionTypeVila'),
//	(29, 'اجاره شبانه', 0, 3, NULL, '', NULL, NULL, 'transactionTypeVila'),
//	(30, 'آسانتور', 0, 1, NULL, '', NULL, NULL, 'possibilities'),
//	(31, 'استخر', 0, 2, NULL, '', NULL, NULL, 'possibilities'),
//	(32, 'سونا', 0, 3, NULL, '', NULL, NULL, 'possibilities'),
//	(33, 'جکوزی', 0, 4, NULL, '', NULL, NULL, 'possibilities'),
//	(34, 'سالن ورزش', 0, 5, NULL, '', NULL, NULL, 'possibilities'),
//	(35, 'سالن اجتماعات', 0, 6, NULL, '', NULL, NULL, 'possibilities'),
//	(36, 'داخل شهرک', 0, 7, NULL, '', NULL, NULL, 'possibilities'),
//	(37, 'داخل مجموعه خصوصی', 0, 8, NULL, '', NULL, NULL, 'possibilities'),
//	(38, 'استخر', 0, 1, NULL, '', NULL, NULL, 'possibilitiesVila'),
//	(39, 'سونا', 0, 2, NULL, '', NULL, NULL, 'possibilitiesVila'),
//	(40, 'جکوزی', 0, 3, NULL, '', NULL, NULL, 'possibilitiesVila'),
//	(41, 'داخل شهرک', 0, 4, NULL, '', NULL, NULL, 'possibilitiesVila'),
//	(42, 'داخل مجموعه خصوصی', 0, 5, NULL, '', NULL, NULL, 'possibilitiesVila'),
//	(43, 'همکف', 0, 1, NULL, '', NULL, NULL, 'floorCount'),
//	(44, 'دوبلکس', 0, 2, NULL, '', NULL, NULL, 'floorCount'),
//	(45, 'تریبلکس', 0, 3, NULL, '', NULL, NULL, 'floorCount'),
//	(46, 'چهار طبقه', 0, 4, NULL, '', NULL, NULL, 'floorCount'),
//	(47, 'پنج طبقه', 0, 5, NULL, '', NULL, NULL, 'floorCount'),
//	(48, 'شش طبقه', 0, 6, NULL, '', NULL, NULL, 'floorCount'),
//	(49, 'واحد تجاری', 0, 7, 'commercial', '', NULL, NULL, 'fileType'),
//	(50, 'مغازه', 0, 1, NULL, '', NULL, NULL, 'commercialType'),
//	(51, 'اداره', 0, 2, NULL, '', NULL, NULL, 'commercialType'),
//	(52, 'موارد دیگر', 0, 3, NULL, '', NULL, NULL, 'commercialType'),
//	(53, 'فروش', 0, 1, NULL, '', NULL, NULL, 'transactionTypeCommercial'),
//	(54, 'مشارکت', 0, 2, NULL, '', NULL, NULL, 'transactionTypeCommercial'),
//	(55, 'فروش یا مشارکت', 0, 3, NULL, '', NULL, NULL, 'transactionTypeCommercial'),
//	(56, 'اجاره', 0, 4, NULL, '', NULL, NULL, 'transactionTypeCommercial'),
//	(57, 'jsj', 0, 0, 'fas fa-baby-carriage', '', '2019-04-10 11:08:41', '2019-04-10 11:08:41', 'possibilitiesVila');
//
