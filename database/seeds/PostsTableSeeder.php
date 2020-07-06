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
        $number = (int) $this->command->ask("how many posts do you want to generate ?", 10);
        $users=App\User::all();

        if($users->count()==0){
            $this->command->info("there is not user in database!!");
            return;
        }

        factory(App\Post::class, $number)->make()->each(function($post) use ($users){
            $post->user_id= $users->random()->id;
            $post->save();
        });
    }
}
