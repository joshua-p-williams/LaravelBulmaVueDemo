<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Created with
 * php artisan make:model --migration Signup
 * or
 * php artisan make:migration create_signups_table --create=signups
 * 
 * Then make sure the database exists 
 * for sqlite
 * touch ./database/database.sqlite
 * 
 * Then migrate
 * php artisan migrate
 */
class CreateSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function (Blueprint $table) {
            $table->string("name", 100);
            $table->string('email', 100)->unique();
            $table->string("theme", 20);
            $table->increments('id');
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
        Schema::dropIfExists('signups');
    }
}
