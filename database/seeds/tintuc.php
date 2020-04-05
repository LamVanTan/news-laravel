<?php

use Illuminate\Database\Seeder;

class tintuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr=[ 
	         ['tentintuc'=>'Ben corona', 'soluong'=>'100'],
	         ['tentintuc'=>'sung dot vietnam va TQ', 'soluong'=>'3000']
	     ];

        DB::table('TinTuc')->insert($arr);
    }
}
