<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
           [
              'image' => 'image/1.jpg',
               'title' => '第一篇题目',
               'content' => '第一篇内容',
               'uid' => 1,
               
           ], 
            [
              'image' => 'image/1.jpg',
               'title' => '第2篇题目',
               'content' => '第2篇内容',
               'uid' => 2,
               
           ],
            [
              'image' => 'image/1.jpg',
               'title' => '第3篇题目',
               'content' => '第3篇内容',
               'uid' => 3,
               
           ],
            [
              'image' => 'image/1.jpg',
               'title' => '第4篇题目',
               'content' => '第4篇内容',
               'uid' => 4,
               
           ],
            [
              'image' => 'image/1.jpg',
               'title' => '第5篇题目',
               'content' => '第5篇内容',
               'uid' => 5,
               
           ],
            [
              'image' => 'image/1.jpg',
               'title' => '第6篇题目',
               'content' => '第6篇内容',
               'uid' => 6,
               
           ],
        ]);
    }
}
