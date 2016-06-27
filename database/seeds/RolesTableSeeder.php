<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'administrator',
                'display_name' => '管理员',
                'description' => '此权限给管理使用'
            ],
            [
                'name' => 'student',
                'display_name' => '学生',
                'description' => '此权限给学生使用。'
            ],
            [
                'name' => 'school',
                'display_name' => '学校',
                'description' => '此权限给学校使用，用于管理学校相关事宜。'
            ],
            [
                'name' => 'teacher',
                'display_name' => '老师',
                'description' => '此权限给老师使用，用于管理老师相关事宜。'
            ],
            [
                'name' => 'grades',
                'display_name' => '年级负责人',
                'description' => '此权限给年级负责人使用。'
            ],
            [
                'name' => 'parents',
                'display_name' => '家长',
                'description' => '此权限给家长使用'
            ],
            [
                'name' => 'director',
                'display_name' => '班主任',
                'description' => '此权限给班主任使用'
            ],
        ]);
    }
}
