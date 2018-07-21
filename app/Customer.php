<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'address', 'contact','vendor_id'];

    public $timestamps = false;

    public function vendor(){
    	return $this->hasMany('App/Vendor','vendor_id', 'id');	
    }
}
