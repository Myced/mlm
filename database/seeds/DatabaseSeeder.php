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
        // $this->call(UsersTableSeeder::class);
        // factory(\App\Admin\Product::class, 25)->create();
        factory(App\Models\UserData::class, 20)->create();
    }
}
