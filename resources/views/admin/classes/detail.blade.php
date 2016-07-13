@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">班级信息
        <span class="hed_te_span">
            <a href="{{ url('/admin/classes/edit',['id' => $classes->id]) }}">编辑班级信息</a>
            <a href="{{ url('/admin/student/add',['id' => $classes->id]) }}">新增学生</a>
            <a href="{{ url('/admin/course/classes',['id' => $classes->id]) }}">班级课程管理</a>
            <a href="{{ url('/admin/exam/classes',['id' => $classes->id]) }}">考试管理</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <div class="row">
        <div class="col-sm-4">
            <div class="statistic-box bg-danger m-bottom-md">
                <div class="statistic-title">班级</div>
                <h3>{{ $classes->name }}</h3>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="statistic-box bg-info m-bottom-md">
                <div class="statistic-title">总人数</div>
                <h3>{{ count($classes->students) }}</h3>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="statistic-box bg-success m-bottom-md">
                <div class="statistic-title">班主任</div>
                <h3>{{ $classes->principal->name }}</h3>
            </div>
        </div>
    </div>
    <!--搜索-->
    <div class="breadcrumb ccsearch">
        <input type="text" class="form-control ccdates" >
        <input type="submit" class="btn btn-success btn-sm" value="搜索">
    </div>
    <!--搜索 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>家校手机号</th>
            <th>家校绑定数</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->sex->name }}</td>
            <td>{{ $student->family_mobile }}</td>
            <td>{{ count($student->parents) }}</td>
            <td class="nscs-table-handle">
                <!--
                <span><a href="{{ url('/admin/student/detail',['id' => $student->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                -->
                <span><a href="{{ url('/admin/student/edit',['id' => $student->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                <span><a href="{{ url('/admin/student/delete',['id' => $student->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <!--分页 begin-->
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {!! $students->render() !!}
                </ul>
            </div>
        </div>
    </div>
    <!--分页 end-->
@endsection