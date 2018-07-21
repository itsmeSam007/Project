<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = [
				    [
				        'name' => 'first vendor',
				        'address' => 'first vendor test address',
				    ],
				    [
				        'name' => 'second vendor',
				        'address' => 'second vendor test address',				        
				    ],
				    [
				        'name' => 'third vendor',
				        'address' => 'third vendor test address',				        
				    ],
				    [
				        'name' => 'fourth vendor',
				        'address' => 'fourth vendor test address',				        
				    ],
				    [
				        'name' => 'fifth vendor',
				        'address' => 'fifth vendor test address',				        
				    ],

		];		    
        DB::table('venders')->insert($vendors);
    }
}
