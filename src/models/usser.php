<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'expiration_date', 'max_connections'];

    public static function find($id) {
        return self::where('id', $id)->first();
    }
}
