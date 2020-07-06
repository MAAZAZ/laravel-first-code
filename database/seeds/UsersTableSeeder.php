<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number=(int)$this->command->ask("how many users do you want to generate ?" , 10 );
        factory(App\User::class, $number)->create();
    }
}
