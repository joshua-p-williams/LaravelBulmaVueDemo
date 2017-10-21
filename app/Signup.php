<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created with
 * php artisan make:model --migration Signup
 * 
 * Make sure to migrate the database
 * (see database/migrations/2017_10_21_031516_create_signups_table.php)
 * 
 */
class Signup extends Model
{
    // We create a list of fillable columns for mass assignment using the ::create([]) method
    protected $fillable = ['name', 'email', 'theme'];
}
