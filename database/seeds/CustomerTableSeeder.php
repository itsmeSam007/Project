<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$customers = [
				    [
				        'name' => 'first customer',
				        'address' => 'first customer test address',
				        'contact' => '9825740000',
				    ],
				    [
				        'name' => 'second customer',
				        'address' => 'second customer test address',
				        'contact' => '9865000000',
				    ],
				    [
				        'name' => 'third customer',
				        'address' => 'third customer test address',
				        'contact' => '9632500000',
				    ],

		];		    
        DB::table('customers')->insert($customers);
    }
}
