<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if($this->command->confirm("do you want to refresh database?",true)){
            $this->command->call("migrate:refresh");
            $this->command->info("database was refreshed!");
        }


         $this->call([UsersTableSeeder::class, PostsTableSeeder::class]);
        /*$users = factory(App\User::class,10)->create();
        $posts =factory(App\Post::class, 50)->make()->each(function($post) use ($users){
            $post->user_id= $users->random()->id;
            $post->save();
        });*/

       /* $comments = factory(App\Comment::class, 500)->make()->each(function ($comment) use ($posts) {
            $comment->user_id = $posts->random()->id;
            $comment->save();
        });*/
    }
}
