@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">教师
        <span class="hed_te_span"><a class="cursa"  href="{{ url('/admin/teacher') }}">管理</a><a href="{{ url('/admin/teacher/add') }}">新增</a></span></h3>
    <!--当前位置 end-->
    <!--搜索-->
    <div class="breadcrumb ccsearch">
        <input type="text" class="form-control ccdates" >
        <input type="submit" class="btn btn-success btn-sm" value="搜索">
    </div>
    <!--搜索 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>教师 ID</th>
            <th>职工号</th>
            <th>姓名</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->teacher_id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->created_at }}</td>
                <td class="nscs-table-handle">
                    <span><a href="{{ url('/admin/teacher/edit',['id' => $teacher->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                    <span><a href="{{ url('/admin/teacher/detail',['id' => $teacher->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                    <span><a href="{{ url('/admin/teacher/delete',['id' => $teacher->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection