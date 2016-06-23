<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/13
 * Time: 16:31
 */

namespace App\Http\Controllers\Admin;


use App\Models\School;
use App\Models\Type;
use Illuminate\Http\Request;

class SchoolController extends AdminController
{
    /**
     * 学校列表
     * @param School $school
     * @return mixed
     */
    public function index(School $school)
    {
        $schools = $school->orderBy('id','desc')->paginate(50);

        return view('admin.school.index',[
            'schools' => $schools
        ]);
    }

    public function add(Type $type)
    {
        $types = $type->get();

        return view('admin.school.add',[
            'types' => $types
        ]);
    }

    public function store(Request $request)
    {
        return redirect('/admin/school')->with('status', 'Profile updated!');
    }
}