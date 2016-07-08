@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">成绩录入
        <span class="hed_te_span">
            <a  class=""  href="{{ url('/admin/exam/classes',['id' => Auth::user()->classes->id]) }}">管理</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <!--提示信息-->
    <div class="sp_prompt">
        <h3><i class="fa fa-warning"></i>&nbsp;&nbsp;操作提示</h3>
        <div class="sp_pro_lst">
            <p><i class="fa fa-angle-double-right"></i>请全部录入后再提交</p>
        </div>
    </div>
    <!--提示信息 end-->
    <form method="post" action="{{ url('/admin/score/add') }}">
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
            </tr>
            </thead>
            <tbody>
            @foreach($exam->classes->students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                @foreach($exam->classes->courses as $course)
                <td><input type="text" name="val[{{ $student->id }}][{{ $course->id }}]" class="form-control input-sm" /></td>
                @endforeach
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center m-top-md">
            <input type="hidden" value="{{ $exam->id }}" name="exam_id" />
            <input type="hidden" value="{{ $exam->classes->id }}" name="classes_id" />
            <button type="submit" class="btn btn-info">提交</button>
        </div>
    </form>
@endsection