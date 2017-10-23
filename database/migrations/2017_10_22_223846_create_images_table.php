<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Created with
 * php artisan make:model --migration Image
 * or
 * php artisan make:migration create_images_table --create=images
 * 
 * Then make sure the database exists 
 * for sqlite
 * touch ./database/database.sqlite
 * 
 * Then migrate
 * php artisan migrate
 */
class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50);
            $table->string('filename', 500);
            $table->integer('signup_id');
            $table->timestamps();

            $table->foreign('signup_id')->references('id')->on('signups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
