<?php

use Illuminate\Database\Seeder;

class ZansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('zans')->insert([
           [
              'post_id' => 1,
               'uid' => 1,
           ], 
            [
              'post_id' => 1,
               'uid' => 2,
           ], 
            [
              'post_id' => 2,
               'uid' => 3,
           ], 
            [
              'post_id' => 1,
               'uid' => 4,
           ], 
            [
              'post_id' => 4,
               'uid' => 5,
           ], 
            [
              'post_id' => 4,
               'uid' => 6,
           ], 
        ]);
    }
}
