<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    private $x;

    protected $fillable = ['name', 'email'];
}