<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(SexTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
