<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'venders';
    protected $fillable = ['name', 'address'];

    public $timestamps = false;

    public function customer(){
    	return $this->belongsTo('App/Customer','vendor_id', 'id');	
    }
}
