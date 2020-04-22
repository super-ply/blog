<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{

    public $table = 'user';
    public $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    public $timestamps = false;

}
