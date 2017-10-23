<?php

namespace App;

use App\Signup;
use Illuminate\Database\Eloquent\Model;

/**
 * Created with
 * php artisan make:model --migration Image
 * 
 * Make sure to migrate the database
 * (see database/migrations/2017_10_22_223846_create_images_table.php)
 * 
 */
class Image extends Model
{
    // We create a list of fillable columns for mass assignment using the ::create([]) method
    protected $fillable = ['type', 'filename', 'signup_id'];

    /**
     * Return the signup that created this image
     *
     * @return void
     */
    public function signup()
    {
        return $this->hasOne(Signup::class, 'id', 'signup_id');
    }
}
