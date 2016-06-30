<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '管理员',
                'email' => 'admin@dyy.name',
                'password' => bcrypt('lop19920303'),
                'created_at' => time(),
                'updated_at' => time()
            ]
        ]);
    }
}
