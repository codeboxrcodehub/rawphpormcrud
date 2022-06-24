<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Migrations extends Eloquent
{
    protected $table = 'migrations';
    public $timestamps = false;
    public $guarded = [];
}