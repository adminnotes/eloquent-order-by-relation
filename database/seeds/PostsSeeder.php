<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class, 50)
            ->create()
            ->each(function($post){
                $post->comments()->saveMany(factory(\App\Comment::class, 20)->make());
            });
    }
}
