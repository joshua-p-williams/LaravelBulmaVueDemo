<?php

namespace App;

use App\Image;
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

    /**
     * Return any images associated with this signup
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'signup_id', 'id');
    }

    /**
     * Lookup a signup by e-mail case insensitive
     *
     * tinker: 
     * App\Signup::ByEmail('Me@Earth.com')->get();
     * 
     * @param [type] $query
     * @param [type] $email
     * @return void
     */
    public function scopeByEmail($query, $email) {
        return $query->where(\DB::raw('upper(email)'), strtoupper($email));
    }
}
