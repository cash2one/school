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
                <h3>{{ count($classes->student) }}</h3>
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
            <th>头像</th>
            <th>姓名</th>
            <th>性别</th>
            <th>家长姓名</th>
            <th>联系方式</th>
            <th>家校绑定</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>01</td>
            <td><img class="men_photo img-circle" src="images/profile1.jpg" /></td>
            <td>丽丽</td>
            <td>女</td>
            <td>张惠</td>
            <td>13584569541</td>
            <td>是</td>
            <td class="nscs-table-handle">
                <span><a href="student_add.html" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                <span><a href="#" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
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