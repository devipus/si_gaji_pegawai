<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	protected $table = 'uploads';
    protected $primaryKey ='id';
    protected $guarded = ['created_at','updated_at'];
}
