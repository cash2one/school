<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/3
 * Time: 14:53
 */

namespace App\Helper;
use App\Models\Exam;
use App\Models\Student;

class Score extends Common
{
    /**
     * 获取成绩排名
     * @param Exam $exam
     * @param Student $student
     * @return int|string
     */
    public static function getExamStudentSort(Exam $exam,Student $student)
    {
        return 0;
        $scores = $exam->scores;

        $total = [];

        foreach ($scores as $score)
        {
            if(!isset($total[$score->student_id]))
            {
                $total[$score->student_id] = 0;
            }

            $total[$score->student_id] += $score->val;
        }

        rsort($total);

        foreach ($total as $key => $item)
        {
            if($item == $total[$student->id])
            {
                return $key + 1;
            }
        }

        return 0;
    }

    /**
     * 获取学生考试成绩
     * @param Exam $exam
     * @param Student $student
     * @return int|mixed
     */
    public static function getExamStudentTotal(Exam $exam,Student $student)
    {
        return 0;
        $scores = $exam->scores;

        $total = [];

        foreach ($scores as $score)
        {
            if(!isset($total[$score->student_id]))
            {
                $total[$score->student_id] = 0;
            }

            $total[$score->student_id] += $score->val;
        }

        if(isset($total[$student->id]))
        {
            return $total[$student->id];
        }

        return 0;
    }

    /**
     * 获取成绩
     * @param $course_id
     * @param $student_id
     * @param $exam_id
     * @return mixed
     */
    public static function getVal($course_id,$student_id,$exam_id)
    {
        return 0;
        $score = new Score();

        $score = $score->where([
            'course_id' => $course_id,
            'student_id' => $student_id,
            'exam_id' => $exam_id
        ])->first();

        if(!$score)
        {
            return 0;
        }

        return $score->val;
    }

    /**
     * 获取排名
     * @param $score
     * @param $total
     * @return int|string
     */
    public static function getSort($score,$total)
    {
        return 0;
        rsort($total);

        foreach ($total as $key => $item)
        {
            if($item == $score)
            {
                return $key + 1;
            }
        }
    }
}