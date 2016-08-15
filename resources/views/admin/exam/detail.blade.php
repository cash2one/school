@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">考试成绩
        <span class="hed_te_span">
            <a  class=""  href="{{ url('/admin/exam/classes',['id' => Auth::user()->classes->id]) }}">管理</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <!--提示信息-->
    <div class="sp_prompt">
        <h3><i class="fa fa-warning"></i>&nbsp;&nbsp;操作提示</h3>
        <div class="sp_pro_lst">
            <p><i class="fa fa-angle-double-right"></i>请在录入成绩后查看考试成绩并在此修改成绩。修改成绩后刷新页面，总成绩和排名会自动更新无需操作</p>
        </div>
    </div>
    <!--提示信息 end-->
    <form method="post" action="#">
    {!! csrf_field() !!}
    <!--搜索-->
        <!--搜索 end-->
        <table class="table table-bordered ccad_table " id="dataTable_a">
            <thead>
            <tr>
                <th>学号</th>
                <th>名字</th>
                @foreach($exam->classes->courses as $course)
                    <th>{{ $course->name }}</th>
                @endforeach
                <th>总成绩</th>
                <th>班级排名</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exam->classes->students as $student)
                <tr class="score">
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    @foreach($exam->classes->courses as $course)
                        <td><input type="text" data-student="{{ $student->id }}" data-course="{{ $course->id }}" value="{{ Score::getVal($course->id,$student->id,$exam->id) }}" class="form-control input-sm score" /></td>
                    @endforeach
                    <td><input type="text" name="total[{{ $student->id }}]" value="@if(isset($total[$student->id])) {{$total[$student->id]}} @else 0 @endif" class="form-control input-sm total_{{ $student->id }}" /></td>
                    <td><input type="text" name="sort[{{ $student->id }}]" value="@if(isset($total[$student->id])) {{ Score::getSort($total[$student->id],$total) }} @else 暂无 @endif" class="form-control input-sm sort_{{ $student->id }}" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center m-top-md">
            <input type="hidden" value="{{ $exam->id }}" name="exam_id" />
            <input type="hidden" value="{{ $exam->classes->id }}" name="classes_id" />
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $(".score").bind('input',function(){

            if(!$(this).val())
            {
                return false;
            }

            var course_id = $(this).attr('data-course');

            var student_id = $(this).attr('data-student');

            var score_val = $(this).val();

            var exam_id = '{{ $exam->id }}';

            $.ajax({
                type: 'POST',
                url: '{{ url('/admin/score/edit') }}',
                data: {val:score_val,course_id:course_id,student_id:student_id,exam_id:exam_id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data){
                    if(data.code == 'success')
                    {
                        $(".total_".student_id).val(data.total);

                        $(".sort_".student_id).val(data.sort);
                    }

                },
                error: function(xhr, type){

                }
            });

        });
    </script>
@endsection