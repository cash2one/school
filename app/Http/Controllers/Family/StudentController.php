<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:38
 */

namespace App\Http\Controllers\Family;


use App\Models\Exam;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends FamilyController
{
    /**
     * 学生列表
     * @return mixed
     */
    public function index()
    {
        $students = $this->user->family->students;

        return view('family.student.index',[
            'students' => $students
        ]);
    }

    /**
     * 学生详情
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function detail(Request $request,Student $student,Exam $exam,Score $score)
    {
        $student = $student->findOrFail($request->id);

        $exam = $exam->where('classes_id',$student->classes->id)->first();

        $firstScores = $exam->scores;

        $studentScore = [];

        $firstScoresTotal = 0;

        foreach ($firstScores as $score)
        {
            $studentScore[$score->student_id] += $score->val;

            if($student->id == $score->student_id)
            {
                $firstScoresTotal += $score->val;
            }
        }

        rsort($studentScore);

        $firstSort = 0;

        foreach ($studentScore as $key => $item)
        {
            if($item == $firstScoresTotal)
            {
                $firstSort = $key;
            }
        }

        return view('family.student.detail',[
            'student' => $student,
            'firstScores' => $firstScores,
            'firstSort' => $firstSort,
            'firstTotal' => $firstScoresTotal
        ]);
    }
}