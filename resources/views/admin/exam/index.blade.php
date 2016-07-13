@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">考试管理
        <span class="hed_te_span">
            <a href="{{ url('/admin/exam/add',['id' => Auth::user()->classes->id]) }}">新增</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>考试编号</th>
            <th>考试名称</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td><a href="#">{{ $exam->name }}</a></td>
                <td>{{ $exam->created_at }}</td>
                <td class="nscs-table-handle">
                    <!--<span><a href="{{ url('/admin/score/add',['id' => $exam->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>成绩录入</p></a></span>-->
                    <span><a href="{{ url('/admin/exam/edit',['id' => $exam->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                    <span><a href="{{ url('/admin/exam/detail',['id' => $exam->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>成绩查看</p></a></span>
                    <span><a href="{{ url('/admin/exam/delete',['id' => $exam->id]) }}" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
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
                    {!! $exams->render() !!}
                </ul>
            </div>
        </div>
    </div>
    <!--分页 end-->
@endsection