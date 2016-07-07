@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">课程管理
        <span class="hed_te_span">
            <a href="{{ url('/admin/course/add',['id' => $classes->id]) }}">新增</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>课程编号</th>
            <th>课程名称</th>
            <th>任课老师</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->teacher->name }}</td>
                <td>{{ $course->created_at }}</td>
                <td class="nscs-table-handle">
                    <span><a href="{{ url('/admin/course/edit',['id' => $course->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                    <span><a href="{{ url('/admin/course/detail',['id' => $course->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                    <span><a href="{{ url('/admin/course/delete',['id' => $course->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection